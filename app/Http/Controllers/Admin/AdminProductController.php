<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function create_submit(Request $request)
    {
        $validated = $request->validate([
            'title' => 'string|required',
            'description' => 'string|required',
            'price' => 'required',
            'medium' => 'string|required',
            'surface' => 'string|required',
            'year_of_creation' => 'required',
            'stock' => 'required',
            'size' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);

        $validated['price'] = $validated['price'] * 100;

        Product::create($validated);

        return redirect()->route('admin_products')->with('success', 'New Art added successfully');
    }
}
