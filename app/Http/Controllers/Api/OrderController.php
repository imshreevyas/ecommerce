<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function addOrder(Request $request){
        $validated = $request->validate([
            'shipping_address' => 'required|string',
            'billing_address' => 'required|string',
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:255',
            'coupon_code' => 'sometimes|string|exists:coupons,code'
        ]);

        DB::beginTransaction();
        try {
            $user = auth()->user();
            
            // Get active cart items
            $cartItems = Cart::with('product')
                ->where('user_id', $user->id)
                ->where('status', 'active')
                ->get();

            if ($cartItems->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cannot place order with empty cart',
                    'error_code' => 'EMPTY_CART'
                ], 400);
            }

            // Calculate order totals
            $mrpAmount = $cartItems->sum(function ($item) {
                return $item->product->mrp * $item->quantity;
            });

            $discount = 0;
            $couponId = null;

            // Apply coupon if provided
            if ($request->has('coupon_code')) {
                $coupon = Coupon::where('code', $validated['coupon_code'])
                    ->where('status', 'active')
                    ->where('valid_from', '<=', now())
                    ->where('valid_until', '>=', now())
                    ->where(function($query) {
                        $query->whereNull('usage_limit')
                            ->orWhereRaw('used_count < usage_limit');
                    })
                    ->first();

                if (!$coupon) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Invalid coupon code',
                        'error_code' => 'INVALID_COUPON'
                    ], 400);
                }

                if ($coupon->discount_type == 'percentage') {
                    $discount = ($mrpAmount * $coupon->discount_value) / 100;
                } else {
                    $discount = $coupon->discount_value;
                }

                // Ensure discount doesn't exceed order value
                $discount = min($discount, $mrpAmount);
                $couponId = $coupon->id;
            }

            $paidAmount = $mrpAmount - $discount;

            // Create order
            $order = Order::create([
                'user_id' => $user->id,
                'payment_status' => 'pending',
                'mrp_amount' => $mrpAmount,
                'discount' => $discount,
                'paid_amount' => $paidAmount,
                'coupon_id' => $couponId,
                'order_status' => 'pending',
                'customer_name' => $validated['customer_name'],
                'customer_phone' => $validated['customer_phone'],
                'shipping_address' => $validated['shipping_address'],
                'billing_address' => $validated['billing_address'],
                'status' => 'active'
            ]);

            // Create order items
            foreach ($cartItems as $cartItem) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product_id,
                    'quantity' => $cartItem->quantity,
                    'mrp_amount' => $cartItem->product->mrp,
                    'discount_amount' => $cartItem->product->discount,
                    'purchase_price' => $cartItem->product->mrp - $cartItem->product->discount,
                    'status' => 'active'
                ]);

                // Update product stock
                Product::where('id', $cartItem->product_id)
                    ->decrement('available_qty', $cartItem->quantity);
            }

            // Mark cart items as inactive
            Cart::where('user_id', $user->id)
                ->where('status', 'active')
                ->update(['status' => 'inactive']);

            // Increment coupon usage if applied
            if ($couponId) {
                Coupon::where('id', $couponId)->increment('used_count');
            }

            // Generate payment URL (simplified example)
            $paymentUrl = $this->generatePaymentUrl($order);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Order placed successfully',
                'data' => [
                    'order' => $order,
                    'items' => $cartItems->map(function ($item) {
                        return [
                            'product_id' => $item->product_id,
                            'title' => $item->product->title,
                            'quantity' => $item->quantity,
                            'unit_price' => $item->product->mrp - $item->product->discount,
                            'total_price' => ($item->product->mrp - $item->product->discount) * $item->quantity
                        ];
                    }),
                    'payment' => [
                        'payment_url' => $paymentUrl
                    ]
                ]
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to place order',
                'error_code' => 'SERVER_ERROR',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    private function generatePaymentUrl($order)
    {
        // In a real implementation, integrate with payment gateway
        return "https://payment-gateway.com/checkout/order_{$order->id}";
    }
    public function history(Request $request){
        try {
            $user = auth()->user();
            
            // Base query
            $query = Order::with(['items.product.images'])
                ->where('user_id', $user->id)
                ->where('status', 'active'); // Using 'active' from your schema
            
            // Apply status filter
            if ($request->has('status')) {
                $query->where('order_status', $request->status);
            }
            
            // Apply sorting
            $sort = $request->input('sort', 'newest');
            $query->orderBy('created_at', $sort === 'newest' ? 'desc' : 'asc');
            
            // Pagination
            $perPage = $request->input('limit', 10);
            $orders = $query->paginate($perPage);
            
            // Transform the order items collection
            $transformedOrders = collect($orders->items())->map(function ($order) {
                return [
                    'id' => $order->id,
                    'order_date' => $order->created_at->toIso8601String(),
                    'status' => $order->order_status,
                    'payment_status' => $order->payment_status,
                    'total_amount' => $order->paid_amount,
                    'items' => $order->items->map(function ($item) {
                        return [
                            'product_id' => $item->product_id,
                            'title' => $item->product->title ?? 'Product not available',
                            'quantity' => $item->quantity,
                            'price' => $item->purchase_price,
                            'image' => optional($item->product->images->first())->image_url
                        ];
                    })
                ];
            });
            
            // Return paginated response
            return response()->json([
                'success' => true,
                'message' => 'Order history retrieved successfully',
                'data' => [
                    'orders' => $transformedOrders,
                    'pagination' => [
                        'total_orders' => $orders->total(),
                        'current_page' => $orders->currentPage(),
                        'per_page' => $orders->perPage(),
                        'total_pages' => $orders->lastPage()
                    ]
                ]
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve order history',
                'error' => $e->getMessage(),
                'error_code' => 'SERVER_ERROR'
            ], 500);
        }
    }
}
