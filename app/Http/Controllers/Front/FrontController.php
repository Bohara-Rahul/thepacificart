<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Artist;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $best_seller_arts = Product::where('isBestSeller', 1)->get();
        $categories = Category::all();
        return view('front.index', compact('best_seller_arts', 'categories'));
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

    public function custom_art()
    {
        return view('front.custom-art');
    }

    public function artist_application()
    {
        return view('front.artist-application');
    }

    public function refund_policy()
    {
        return view('front.refund-policy');
    } 

    public function terms_conditions()
    {
        return view('front.terms-conditions');
    } 
}
