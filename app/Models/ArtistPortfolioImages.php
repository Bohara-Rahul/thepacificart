<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PendingArtist;

class ArtistPortfolioImages extends Model
{
    protected $fillable = ['artist_id', 'name'];
    
    public function artist()
    {
        return $this->belongsTo(PendingArtist::class);
    }
}
