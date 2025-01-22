<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class AdminSlidersController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function create_submit(Request $request)
    {
        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|mimes:jpg,jpeg,png,svg,webp|max:2048'
            ]);

            $filename = 'slider_'.time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads', $filename));

            $slider = new Slider();
            $slider->image_path = $filename;
            $slider->save();
        }
        
        return redirect()
            ->route('admin_sliders_index')
            ->with('success', 'Slider created successfully');
    }

    public function delete($id)
    {
        $slider = Slider::where('id', $id)->first();
        // if ($slider->image_path != '') {
        //     unlink(public_path('uploads/'.$slider->image_path));
        // }
       
        $slider->delete();
        return view('admin.sliders.index')
            ->with('success', 'Slider deleted successfully');
    }
}
