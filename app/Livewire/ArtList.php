<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ArtList extends Component
{
    public $searchTerm = '';
    public $results;
    public $selectedCategories = [];

    public function render()
    {        
        $categories = Category::all();
        
        if ($this->searchTerm == '') {
            if (count($this->selectedCategories)) {
                $this->results = Product::when(count($this->selectedCategories), function ($query) {
                    $query->whereIn('category_id', $this->selectedCategories);
                })->get();
            } else {
                $this->results = Product::all();
            }
        } else {
            $this->results = Product::search($this->searchTerm)->get();
        }

        return view('livewire.art-list', [
            'arts' => $this->results,
            'categories' => $categories,
        ]);
    }
}
