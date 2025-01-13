<?php

namespace App\Http\Controllers\Admin;

use App\Models\Artist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::all();
        return view('admin.artist.index', compact('artists'));
    }

    public function create()
    {
        return view('admin.artist.create');
    }

    public function create_submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'required|string',
            'location' => 'required|string',
        ]);

        $artist = new Artist();

        if ($request->photo) {
            $request->validate([
                'photo' => 'string|mimes:jpg,jpeg,png,svg,webp|max:2048'
            ]);

            $filename = $request->name.'_'.time().'.'.$request->photo->extension();                 
            $request->photo->move(public_path('uploads', $filename));
            $artist->photo = $filename;
        } else {
            $artist->photo = "fallback-avatar.jpg";
        }

        $artist->name = $request->name;
        $artist->bio = $request->bio;
        $artist->location = $request->location;
        $artist->save();

        return redirect()->route('admin_artists')->with('success', 'New Artist Added successfully');

    }
}
