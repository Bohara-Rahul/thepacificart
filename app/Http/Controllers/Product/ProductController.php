<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product_detail($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('front.product-detail', compact('product'));
    }
}
