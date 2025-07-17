<?php

namespace App\Livewire;

use Livewire\Component;

class ArtFilter extends Component
{
    public $category = '';
    public $artist = '';
    public $orientation = '';
    public $location = '';
  

    public function apply()
    {
        $this->dispatch('apply-filters', [
            'category' => $this->category,
            'artist' => $this->artist,
            'orientation' => $this->orientation,
            'location' => $this->location
        ]);
    } 

    public function resetFilters()
    {
        $this->reset(['category', 'artist', 'location', 'orientation']);
    }

    public function render()
    {
        return view('livewire.art-filter', [
            'artists' => \App\Models\Artist::pluck('name', 'id'),
            'locations' => \App\Models\Artist::distinct()->pluck('location'),
            'categories' => \App\Models\Category::pluck('title', 'id'),
        ]);
    }
}
