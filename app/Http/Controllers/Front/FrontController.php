<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view("front.index", compact('products'));
    }

    public function about()
    {
        return view("front.about");
    }
    
    public function gallery()
    {
        return view("front.gallery");
    }
    
    public function arts()
    {
        return view("front.arts");
    }
    public function blog()
    {
        return view("front.blog");
    }
}
