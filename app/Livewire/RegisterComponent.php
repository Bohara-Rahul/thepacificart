<?php

namespace App\Livewire;

use Livewire\Component;

class RegisterComponent extends Component
{
    public $full_name, $password, $confirm_password;
    
    public function render()
    {
        return view('livewire.register-component');
    }
}
