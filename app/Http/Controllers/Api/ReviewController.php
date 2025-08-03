<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create(Request $request, $product_id){
        // Validate request
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:500',
            'order_id' => 'required|integer|exists:orders,id'
        ]);

        try {
            $user = auth()->user();
            $product = Product::findOrFail($product_id);

            // Verify user purchased this product in the specified order
            $orderItem = OrderItem::where('order_id', $validated['order_id'])
                ->where('product_id', $product_id)
                ->whereHas('order', function($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->first();

            if (!$orderItem) {
                return response()->json([
                    'success' => false,
                    'message' => 'You can only review products you\'ve purchased',
                    'error_code' => 'REVIEW_NOT_ALLOWED'
                ], 403);
            }

            // Check for existing review
            $existingReview = Review::where('user_id', $user->id)
                ->where('product_id', $product_id)
                ->exists();

            if ($existingReview) {
                return response()->json([
                    'success' => false,
                    'message' => 'You have already reviewed this product',
                    'error_code' => 'DUPLICATE_REVIEW'
                ], 409);
            }

            // Create review
            $review = Review::create([
                'product_id' => $product_id,
                'user_id' => $user->id,
                'order_id' => $validated['order_id'],
                'rating' => $validated['rating'],
                'comment' => $validated['comment'],
                'status' => 'pending' // Assuming you want to moderate reviews first
            ]);

            // Calculate new average rating
            $averageRating = Review::where('product_id', $product_id)
                ->where('status', 'approved')
                ->avg('rating');

            return response()->json([
                'success' => true,
                'message' => 'Review added successfully',
                'data' => [
                    'review' => $review,
                    'average_rating' => round($averageRating, 1)
                ]
            ], 201);

        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found',
                'error_code' => 'PRODUCT_NOT_FOUND'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add review',
                'error_code' => 'SERVER_ERROR'
            ], 500);
        }
    }
}
