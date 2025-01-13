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
            'title' => 'required|string',
        ]);

        $category = new Category();
        $category->title = $request->title;
        $category->save();

        return redirect()->route('admin_categories')->with('success', 'New Category created');
    }

    public function edit($id)
    {
        $category = Category::where('id', $id)->first();
        return view('admin.category.edit', compact('category'));
    }

    public function edit_submit(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            // 'slug' => 'required|string|alpha_dash|unique:categories,slug,'.$id,
        ]);

        $category = Category::where('id', $id)->first();
        $category->title = $request->title;
        $category->save();
        return redirect()->route('admin_categories')->with('success', 'Category updadted successfully');
    }

    public function delete($id)
    {
        $category = Category::where('id', $id)->first();
        $category->delete();
        return redirect()->route('admin_categories')->with('success', 'Category deleted successfully');
    }
}
