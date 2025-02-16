<?php

namespace App\Http\Controllers\Admin;

use App\Models\Artist;
use App\Models\PendingArtist;
use App\Mail\ArtistApproved;
use App\Mail\ArtistRejected;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

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

    public function approve_application($id)
    {
        $pending_artist = PendingArtist::findOrFail($id);

        // Move to artists table
        Artist::create([
            'name' => $pending_artist->fullname,
            'email' => $pending_artist->email,
            'location' => $pending_artist->country,
            'portfolio_link' => $pending_artist->portfolio_link,
            'bio' => $pending_artist->bio,
            'phone_number' => $pending_artist->phone_number
        ]);
        
        $pending_artist->delete();

        // Send approval email
        Mail::to($pending_artist->email)->send(new ArtistApproved($pending_artist));

        return redirect()->route('admin_pending_artists')->with('success', 'Application was successfully approved');

    }

    public function reject_application($id)
    {
        $pending_artist = PendingArtist::findOrFail($id);
        $pending_artist->update(['application_status' => 'rejected']);

        // Send rejection email
        Mail::to($pending_artist->email)->send(new ArtistRejected($pending_artist));

        return redirect()->route('admin_pending_artists')->with('success', 'Application rejected successfully');
    }
}
