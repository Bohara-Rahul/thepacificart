<?php

namespace App\Models;

use App\Models\Photo;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        "title",
        "slug",
        "description",
        "price",
        "medium",
        "surface",
        "year_of_creation",
        "stock",
        "size"
    ];

    public function photos() 
    {
        $this->hasMany(Photo::class);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
