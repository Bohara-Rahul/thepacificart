@extends('admin.layout.admin-layout')
@section('main_content')
@include('admin.layout.sidebar')
<section>
  <h2>Edit Product</h2>
  <div class="flex gap-2">
    @if ($product->photos->count() > 0)
      <p>Current Photos</p>
      @foreach($product->photos as $photo)
      <article>
        <img
            src="{{ asset('uploads/'.$photo->name) }}" 
            alt="{{ $product->title }}" 
            style="width: 200px; height: auto;"
          />
        <form 
          action="{{ route('admin_photo_delete', $photo) }}" 
          method="POST" 
        >  
          @csrf
          @method('DELETE')     
          <button class="bg-red-300 p-2" type="submit">Delete</button>
        </form>
      </article>
      @endforeach  
    @endif
    
  </div>
  <form 
    action="{{ route('admin_products_edit_submit', $product->id) }}" 
    method="POST" 
    enctype="multipart/form-data"
  >
    @csrf
    @method('PUT')
    <div>
      <label for="files">Add photo:</label>
      <input 
        type="file" 
        id="files"
        name="files[]" 
        multiple
      />
    </div>
    
    <div>
      <label for="title">Title:</label>
      <input 
        type="text" 
        id="title"
        name="title" 
        value="{{ $product->title }}" 
      />
    </div>
    <div>
      <label for="artist_id">Artist</label>
      <select name="artist_id" id="artist_id" required>
        <option value="" disabled selected>
          Select an artist
        </option>
        @foreach ($artists as $artist)
          <option 
            value="{{ $artist->id }}"
            {{ $artist->id == $product->id ? 'selected' : '' }}
          >
            {{ $artist->name }}
          </option>  
        @endforeach
      </select>
    </div>
    <div>
      <label for="category_id">Category</label>
      <select id="category_id" name="category_id" required>
        <option value="" disabled selected>
          Select a category
        </option>
        @foreach ($categories as $category)
          <option 
            value="{{ $category->id }}"
            {{ $category->id == $product->category_id ? 'selected' : '' }}
          >
            {{ $category->title }}
          </option>   
        @endforeach
      </select>
    </div>
    <div>
      <label for="description">Description:</label>
      <textarea
        name="description"
        id="description"
        rows="10"
      >
        {{ $product->description }}
      </textarea>
    </div>
    <div>
      <label for="medium">Medium:</label>
      <input 
        type="text" 
        id="medium"
        name="medium" 
        value="{{ $product->medium }}" 
      />
    </div>
    <div>
      <label for="surface">Surface:</label>
      <input 
        type="text" 
        id="surface"
        name="surface" 
        value="{{ $product->surface }}" 
      />
      <div>
        <label for="year_of_creation">Year_of_creation:</label>
        <input 
          type="text" 
          id="year_of_creation"
          name="year_of_creation" 
          value="{{ $product->year_of_creation }}" 
        />
      </div>
      <div>
        <label for="stock">Stock:</label>
        <input 
          type="text" 
          id="stock"
          name="stock" 
          value="{{ $product->stock }}" 
        />
      </div>
      <div>
        <label for="size">Size:</label>
        <input 
          type="text" 
          id="size"
          name="size" 
          value="{{ $product->size }}" 
        />
      </div>
      <div>
        <label for="price">Price:</label>
        <input 
          type="number" 
          id="price"
          name="price" 
          value="{{ $product->price }}" 
        />
      </div>
    <button type="submit">Update</button>
  </form>
</section>
@endsection

