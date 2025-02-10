<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\PendingArtist;

class ArtistApplicationForm extends Component
{
    use WithFileUploads;

    public $fullname;
    public $phone_number;
    public $email;
    public $bio;
    public $portfolio_link;
    public $images = [];
    public $previewUrls = [];
    public $isChecked = false;

    public function updatedImages()
    {
        // Reset preview URLs
        $this->previewUrls = [];

        foreach ($this->images as $image) {
            $this->previewUrls[] = $image->temporaryUrl();
        }
    }

    public function save()
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|unique:pending_artists,email|unique:artists,email',
        //     'portfolio_link' => 'nullable|url',
        //     'profile_picture' => 'nullable|string',
        //     'bio' => 'nullable|string',
        // ]);

        // PendingArtist::create($request->all());

        // return response()->json(['message' => 'Application submitted successfully!'], 201);

        $artist = PendingArtist::create([
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'bio' => $this->bio,
            'portfolio_link' => $this->portfolio_link,
        ]);

        return back()->with('success', 'Application Submitted successfully!!!');
    }

    public function render()
    {
        return view('livewire.artist-application-form');
    }
}
