<?php

namespace App\Http\Controllers\Product;

use App\Models\Photo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function delete(Photo $photo)
    {
        if ($photo->delete()) {
            return back()->with('success', 'Photo deleted successfully');
        }
        return "Could not deleted photo";
    }
}
