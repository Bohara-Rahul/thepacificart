<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Artist;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $products = Product::with(['photos', 'category', 'artist'])->get();
        $categories = Category::all();
        $sliders = Slider::get();
        return view('front.index', compact('products', 'sliders', 'categories'));
    }

    public function arts()
    {
        $arts = Product::all();
        return view("front.arts", [
            'arts' => $arts
        ]);
    }
    
    public function artists()
    {
        $artists = Artist::all();
        return view("front.artists", compact('artists'));
    }

    public function about()
    {
        return view("front.about-us");
    }

    public function blog()
    {
        return view("front.blog");
    }
}
