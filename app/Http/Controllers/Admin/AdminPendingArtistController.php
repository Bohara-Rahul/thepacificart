<?php

namespace App\Http\Controllers\Admin;

use App\Models\Artist;
use App\Http\Controllers\Controller;
use App\Models\PendingArtist;
use Illuminate\Http\Request;

class AdminPendingArtistController extends Controller
{
    public function index()
    {
        $pending_artists = PendingArtist::all();
        return view('admin/pending-artist/index', compact('pending_artists'));
    }

    public function view($id)
    {
        $pending_artist = PendingArtist::findOrFail($id);
        return view('admin/pending-artist/view', compact('pending_artist'));
    }

    public function approveApplication($id)
    {
        $pending_artist = PendingArtist::findOrFail($id);

        // Move to artists table
        Artist::create([
            'name' => $pending_artist->name,
            'email' => $pending_artist->email,
            'portfolio_link' => $pending_artist->portfolio_link,
            'profile_picture' => $pending_artist->profile_picture,
            'bio' => $pending_artist->bio,
            'store_url' => null,
            'payment_info' => null,
        ]);
        
        $pending_artist->delete();

        return redirect()->route('admin_pending_artists')->with('success', 'Application was successfully approved');

    }

    public function rejectApplication($id)
    {
        $pending_artist = PendingArtist::findOrFail($id);
        $pending_artist->update(['application_status' => 'rejected']);

        return redirect()->route('admin_pending_artists')->with('success', 'Application rejected successfully');
    }
}
