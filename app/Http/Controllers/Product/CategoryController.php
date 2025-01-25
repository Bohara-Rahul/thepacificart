<?php

namespace App\Http\Controllers\Product;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category_detail($slug)
    {
        $category = Category::where('slug', $slug)
            ->firstOrFail();
        $products = $category->products;
        return view('front.category_detail', compact('products', 'category'));
    }
}
