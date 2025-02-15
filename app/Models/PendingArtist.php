<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingArtist extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'email',
        'country',
        'phone_number',
        'bio',
        'portfolio_link',
        'application_status',
        'images'
    ];

    public function portfolio_images()
    {
        return $this->hasMany(ArtistPortfolioImages::class);
    }
}
