<?php

namespace App\Livewire;

use Livewire\Component;

class HelloWorld extends Component
{
    public function sayHello()
    {
        dd('hello mate');
    }

    public function render()
    {
        return view('livewire.hello-world');
    }
}
