<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Artist;

class ArtistList extends Component
{
    public function render()
    {
        $artists = Artist::all();
        return view('livewire.artist-list', [
            'artists' => $artists,
        ]);
    }
}
