<?php

namespace App\Livewire;

use App\Models\ArtistPortfolioImages;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\PendingArtist;

class ArtistApplicationForm extends Component
{
    use WithFileUploads;

    public $fullname;
    public $phone_number;
    public $email;
    public $country;
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
        $this->validate([
            'fullname' => 'string|required',
            'email' => 'string|required|email',
            'country' => 'string|required',
            'phone_number' => 'required',
            'bio' => 'required|string',
            'portfolio_link' => 'string',
        ]);

        PendingArtist::create([
            'fullname' => $this->fullname,
            'email' => $this->email,
            'country' => $this->country,
            'phone_number' => $this->phone_number,
            'bio' => $this->bio,
            'portfolio_link' => $this->portfolio_link,
        ]);

        return redirect()
            ->back()
            ->with('success', 'You have successfully submitted the application');
    }

    public function render()
    {
        return view('livewire.artist-application-form');
    }
}
