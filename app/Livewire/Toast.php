<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Toast extends Component
{
    public $message;
    public $visible = false;
    public $type = 'success'; // Can be 'success' or 'error'

    protected $listeners = ['showToast'];

    public function showToast($message, $type = 'success')
    {
        $this->message = $message;
        $this->type = $type;
        $this->visible = true;

        // Auto-hide after 3 seconds
        $this->dispatchBrowserEvent('hide-toast');
    }

    public function render()
    {
        return view('livewire.toast');
    }
}
