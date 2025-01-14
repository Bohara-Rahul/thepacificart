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

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,svg,webp|max:2048'
            ]);

            $filename = 'artist_'.time().'.'.$request->photo->extension();                 
            $request->photo->move(public_path('uploads'), $filename);
            $artist->photo = $filename;
        }

        $artist->name = $request->name;
        $artist->bio = $request->bio;
        $artist->location = $request->location;
        $artist->save();

        return redirect()->route('admin_artists')->with('success', 'New Artist Added successfully');

    }

    public function edit($id)
    {
        $artist = Artist::where('id', $id)->first();
        return view('admin.artist.edit', compact('artist'));
    }

    public function edit_submit(Request $request, $id)
    {
        $artist = Artist::where('id', $id)->first();

        $request->validate([
            'name' => 'required|string',
            'bio' => 'required|string',
            'location' => 'required|string'
        ]);

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,svg,webp|max:2048'
            ]);

            if ($artist->photo != '') {
                unlink(public_path('uploads/'.$artist->photo));
            }

            $filename = 'artist_'.time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $filename);
            $artist->photo = $request->photo;
        } 

        $artist->name = $request->name;
        $artist->location = $request->location;
        $artist->bio = $request->bio;
        $artist->save();

        return redirect()->route('admin_artists')->with('success', 'Artist updated successfully');
    }

    public function delete($id)
    {
        $artist = Artist::where('id', $id)->first();
        if ($artist->photo != '') {
            unlink(public_path('uploads/'.$artist->photo));
        }
        $artist->delete();
        return redirect()->route('admin_artists')->with('success', 'Artist deleted successfully!!!');
    }
}
