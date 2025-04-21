<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class EditProfile extends Component
{
    use WithFileUploads;

    public $name, $phone, $address, $profile_image;

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->phone = $user->phone;
        $this->address = $user->address;
    }

    public function updateProfile()
    {
        $this->validate([
            'name' => 'required|string',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'profile_image' => 'nullable|image|max:2048',
        ]);

        $user = Auth::user();
        $user->name = $this->name;
        $user->phone = $this->phone;
        $user->address = $this->address;

        if ($this->profile_image) {
            $path = $this->profile_image->store('public/profile_images');
            $user->profile_image = str_replace('public/', '', $path);
        }

        $user->save();

        session()->flash('success', 'Profile updated!');
    }

    public function render()
    {
        return view('livewire.edit-profile')->layout('layouts.dashboard');
    }
}

