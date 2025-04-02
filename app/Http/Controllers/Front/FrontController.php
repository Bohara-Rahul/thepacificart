<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Artist;
use App\Models\Category;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index()
    {
        $best_seller_arts = Product::where('isBestSeller', 1)->get();
        $categories = Category::all();
        return view('front.index', compact('best_seller_arts', 'categories'));
    }

    public function gallery()
    {
        $arts = Product::all();
        return view("front.gallery", [
            'arts' => $arts
        ]);
    }
    
    public function categories()
    {
        $categories = Category::all();
        return view("front.categories", [
            'categories' => $categories
        ]);
    }
    
    public function artists()
    {
        $artists = Artist::all();
        return view("front.artists", compact('artists'));
    }

    public function artist_detail(Artist $artist)
    {
        $arts = Product::where('artist_id', $artist->id)->get();
        return view("front.artist-detail", compact('artist', 'arts'));
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

    public function whats_new()
    {
        return view('front.whats-new');
    }

    public function refund_policy()
    {
        return view('front.refund-policy');
    } 

    public function terms_conditions()
    {
        return view('front.terms-conditions');
    } 

    public function cart()
    {
        return view('front.cart');
    }

    public function checkout()
    {
        return view('front.checkout');
    }

    public function add_to_wishlist($product_id)
    {
        if (!Auth::check()) {
            return redirect()->route('user.login')->with('error', 'Please login to add this art in your wishlist');
        }

        $user_id = Auth::user()->id;

        $itemCount = Wishlist::where('user_id', $user_id)->where('product_id', $product_id)->count();
        if ($itemCount > 0) {
            return back()->with('error', 'This art is already in your wishlist');
        }

        $wishlist = new Wishlist();
        $wishlist->product_id = $product_id;
        $wishlist->user_id = $user_id;
        if ($wishlist->save()) {
            return back()->with('success', 'The art has been added to wishlist successfully');
        }
        return back()->with('error', 'Could not add to the wishlist. Try again later');
    }

    public function remove_from_wishlist($product_id)
    {
        if (!Auth::check()) {
            return redirect()->route('user.login')->with('error', 'Please login to remove this item from your wishlist');
        }

        $user_id = Auth::user()->id;

        $item = Wishlist::where('user_id', $user_id)->where('product_id', $product_id);

        if ($item) {
            $item->delete();
            return back()->with('success', 'Removed item from wishlist');
        }

        return back()->with('error', 'Could not remove from the wishlist. Try again later');
    }
}
