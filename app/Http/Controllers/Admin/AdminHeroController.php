<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;

class AdminHeroController extends Controller
{
    public function index()
    {
        $hero = HeroSection::where('id', 1)->first();
        return view('admin.hero.index', compact('hero'));
    }

    public function edit_submit(Request $request, $id)
    {
        $hero = HeroSection::findOrFail($id);

        $validated = $request->validate([
            'slogan' => 'string|required',
            'content' => 'string|required'
        ]);

        $hero->update($validated);
        return view('admin.hero.index')
            ->with('success', 'Hero Section updated successfully!!!');
    }
}
