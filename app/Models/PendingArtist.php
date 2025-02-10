<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingArtist extends Model
{
    use HasFactory;

    protected $fiillable = [
        'bio',
        'email',
        'country',
        'fullname',
        'phone_number',
        'portfolio_link',
        'application_status'
    ];

    public function portfolio_images()
    {
        return $this->hasMany(ArtistPortfolioImages::class);
    }
}
