<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = [
        'name',
        'location',
        'bio',
        'photo'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
