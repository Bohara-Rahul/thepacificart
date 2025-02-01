<?php

namespace App\Livewire;

use Livewire\Component;

class TestComponent extends Component
{
    public $name = 'Aman';
    public function render()
    {
        return view('livewire.test-component');
    }
}
