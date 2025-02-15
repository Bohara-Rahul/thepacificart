<?php

namespace App\Http\Controllers\Admin;

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
}
