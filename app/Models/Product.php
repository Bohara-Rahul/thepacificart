<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

class Product extends Model
{

    protected static function booted()
    {
        static::deleting(function ($product) {
            // Delete photo from DB
            $product->photos()->each(function ($photo) {
                // Delete photos from uploads folder
                if ($photo->path && file_exists(public_path('uploads/' . $photo->path))) {
                    unlink(public_path('uploads/' . $photo->path));
                }

                $photo->delete();
            });
        });
    }

    use HasTrixRichText;
    
    public function scopeSearch($query, $searchTerm)
    {
        return $query->where('title', 'LIKE', "%{$searchTerm}%")
            ->orWhere('artist', 'LIKE', "%{$searchTerm}%")
            ->orWhere('description', 'LIKE', "%{$searchTerm}%");
    }

    protected $fillable = [
        "title",
        "description",
        "slug",
        "price",
        "medium",
        "surface",
        "year_of_creation",
        "stock",
        "size",
        "category_id",
        "artist_id",
        "isBestSeller",
        "primary_image",
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

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getPriceAttribute($value)
    {
        return $this->attributes['price'] = $value / 100;
    }

    public function setPriceAttribute($value)
    {
        return $this->attributes['price'] = $value * 100;
    }
}
