<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

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

    public function render()
    {
        return view('livewire.artist-application-form');
    }
}
