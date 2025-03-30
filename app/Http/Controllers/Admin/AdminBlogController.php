<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blogs.index', [
            'blogs' => $blogs
        ]);
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function create_submit(Request $request)
    {
        $validated = $request->validate([
            'title' => 'string|required',
            'content' => 'string|required',
        ]);

        $blog = Blog::create($validated);
        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully!!!');
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('trix-images', 'public');
            return response()->json(['url' => asset('storage/' . $path)]);
        }
        return response()->json(['error' => 'Upload failed'], 400);
    }
}
