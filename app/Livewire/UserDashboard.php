<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class UserDashboard extends Component
{
    public $orders;

    public function mount()
    {
        $this->orders = Order::where('user_id', Auth::id())
            ->latest()
            ->take(5)
            ->get();
    }

    public function render()
    {
        return view('livewire.user-dashboard');
    }
}
