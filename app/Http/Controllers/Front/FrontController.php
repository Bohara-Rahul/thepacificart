<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Artist;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $products = Product::with(['photos', 'category', 'artist'])->get();
        $sliders = Slider::get();
        return view('front.index', compact('products', 'sliders'));
    }

    public function arts()
    {
        return view("front.arts");
    }
    
    public function gallery()
    {
        return view("front.gallery");
    }
    
    public function artists()
    {
        $artists = Artist::all();
        return view("front.artists", compact('artists'));
    }
    public function blog()
    {
        return view("front.blog");
    }
}
