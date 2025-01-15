<?php

namespace App\Models;

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
        "size",
        "category_id",
        "artist_id",
        "files"
    ];

    public function photos() 
    {
        return $this->hasMany(Photo::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
