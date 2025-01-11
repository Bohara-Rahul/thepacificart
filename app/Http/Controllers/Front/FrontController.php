<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        return view("front.index");
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
