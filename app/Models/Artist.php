<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = [
        'name',
        'email',
        'location',
        'bio',
        'phone_number',
        'portfolio_link',
        'photo'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
