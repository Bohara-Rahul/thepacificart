<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function create_submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string|unique'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $created = $category->save();

        if ($created) {
            return redirect()->route('category.index')->with('success', 'Category created successfully');
        } else {
            return redirect()->route('category.create')->with('failure', 'Failure to create Category');
        }
    }
}
