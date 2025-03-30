<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\withPagination;

class ArtList extends Component
{

    use withPagination;

    public $results;
    public $searchTerm = '';
    public $selectedPrice = '';
    public $selectedCategories = [];

    // Function to update category when the user selects one
    public function updatedSelectedCategory($value)
    {
        $this->resetPage(); // Reset pagination when category changes
    }

    // Resets all properties of form
    public function resetForm()
    {
        $this->reset();
    }
    
    public function render()
    {        
        $categories = Category::all();

        $query = Product::query();

        if ($this->searchTerm == '') {
            if (count($this->selectedCategories)) {
                $query->when(count($this->selectedCategories), function ($subQuery) {
                    $subQuery->whereIn('category_id', $this->selectedCategories);
                })->get();
            } else {
                $query->get();
            }
        } else {
            $query->search($this->searchTerm);
        }

        // if ($this->selectedPrice) {
            
        // }

        return view('livewire.art-list', [
            'arts' => $query->paginate(15),
            'categories' => $categories,
        ]);
    }
}
