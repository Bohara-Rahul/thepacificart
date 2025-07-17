<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Artist;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Illuminate\Support\Str;

class ArtList extends Component
{
    use WithPagination;

    public $category = '';
    public $artist = '';
    public $orientation = '';
    public $location = '';

    #[On('apply-filters')]
    public function filter_arts($filters)
    {
        $this->category = $filters['category'];
        $this->location = $filters['location'];
        $this->artist = $filters['artist'];
        $this->orientation = $filters['orientation'];
    }

    public function render()
    {
        $query = Product::query()->latest();

        if (!empty($this->category)) {
            $query->where('category_id', $this->category);
        }

        // if (!empty($this->priceRange) && Str::contains($this->priceRange, '-')) {
        //     [$min, $max] = explode('-', $this->priceRange);
        //     $query->whereBetween('price', [(float)$min, (float)$max]);
        // }

        if (!empty($this->artist)) {
            $query->where('artist_id', $this->artist);
        }

        if (!empty($this->location)) {
            $query->where('location', $this->location);
        }

        if (!empty($this->orientation)) {
            $query->where('orientation', $this->orientation);
        }

        $arts = $query->paginate(16);

        return view('livewire.art-list', [
            'arts' => $arts,
            'artists' => \App\Models\Artist::pluck('name', 'id'),
            'locations' => \App\Models\Artist::distinct()->pluck('location'),
            'categories' => \App\Models\Category::pluck('title', 'id'),
        ]);
    }
}


