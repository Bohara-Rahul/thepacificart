<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
    }

    public function create()
    {
        return view('admin.blogs');
    }
}
