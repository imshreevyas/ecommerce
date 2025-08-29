<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index()
    {
         $products = Product::with(['product_images'])
        ->where('status', 'active')
        ->orderBy('created_at', 'desc')
        ->get();

    // Return view with all products
    return view('front.index', [
        'products' => $products
    ]);
    }
    public function productDetail($id)
    {
        $product = Product::with(['product_images'])->findOrFail($id);

        return view('front.product-detail', [
            'product' => $product
        ]);
    }
}
