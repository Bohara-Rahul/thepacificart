<?php

namespace App\Livewire;

use Livewire\Component;

class MobileMenu extends Component
{
    public bool $menuOpen = false;

    public function toggleMenu()
    {
        $this->menuOpen = !$this->menuOpen;
    }
    
    public function render()
    {
        return view('livewire.mobile-menu');
    }
}
