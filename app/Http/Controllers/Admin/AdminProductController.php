<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Artist;
use App\Models\Category;
use App\Models\Photo;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $artists = Artist::all();
        return view('admin.products.create', compact('categories', 'artists'));
    }

    public function create_submit(Request $request)
    {
        $validated = $request->validate([
            'title' => 'string|required',
            'description' => 'string|required',
            'price' => 'required',
            'medium' => 'string|required',
            'surface' => 'string|required',
            'year_of_creation' => 'required',
            'stock' => 'required',
            'size' => 'required',
            'category_id' => 'required|exists:categories,id',
            'artist_id' => 'required|exists:artists,id',
        ]);

        $validated['price'] = $validated['price'] * 100;

        $product = Product::create($validated);

        if ($request->hasFile('files')) {
            $request->validate([
                'files.*' => 'required|image|mimes:jpg,jpeg,png,svg,webp'
            ]);

            foreach($request->file('files') as $file) {
                $filename = 'photo_'.time().'.'.$file->extension();
                $file->move(public_path('uploads'), $filename);

                Photo::create([
                    'name' => $filename,
                    'product_id' => $product->id,
                ]);
            }
        }

        return redirect()
            ->route('admin_products')
            ->with('success', 'New Art added successfully');
    }

    public function edit($id)
    {
        $product = Product::with('photos')->find($id);

        if (!$product) {
            return redirect()->back()->with('failure', 'Product Not Found!!!');
        }

        $categories = Category::all();
        $artists = Artist::all();

        return view('admin.products.edit', compact('product', 'categories', 'artists'));
    }

    public function edit_submit(Request $request, $id)
    {
        $product = Product::where('id', $id)->first();
        
        $request->validate([
            'title' => 'string|required',
            'description' => 'string|required',
            'price' => 'required',
            'medium' => 'string|required',
            'surface' => 'string|required',
            'year_of_creation' => 'required',
            'stock' => 'required',
            'size' => 'required',
            'category_id' => 'required|exists:categories,id',
            'artist_id' => 'required|exists:artists,id'
        ]); 

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->medium = $request->medium;
        $product->surface = $request->surface;
        $product->year_of_creation = $request->year_of_creation;
        $product->stock = $request->stock;
        $product->size = $request->size;
        $product->category_id = $request->category_id;
        $product->artist_id = $request->artist_id;
        $product->save();

        return redirect()->route('admin_products')->with('success', 'Art updated successfully');
    }

    public function delete($id)
    {
        $product = Product::where('id', $id)->first();
        $product->delete();
        return redirect()->route('admin_products')->with('success', 'Product deleted successfully!!!');
    }
}
