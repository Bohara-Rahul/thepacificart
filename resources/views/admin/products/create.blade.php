@extends('admin.layout.admin-layout')
@section('main_content')
@include('admin.layout.sidebar')
  <form 
    action="{{ route('admin_products_create_submit') }}" method="POST" 
    enctype="multipart/form-data"
  >
    @csrf
    <div>
      <label for="title">Title</label>
      <input 
        type="text" 
        name="title" 
        value="{{ old('title') }}" 
        required 
      />
    </div>
    <div>
      <label for="artist_id">Artist</label>
      <select name="artist_id" id="artist_id" required>
        <option value="" disabled selected>
          Select an artist
        </option>
        @foreach ($artists as $artist)
          <option value="{{ $artist->id }}">
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
          <option value="{{ $category->id }}">
            {{ $category->title }}
          </option>   
        @endforeach
      </select>
    </div>
    <div>
      <label for="description">Description</label>
      <textarea 
        id="description" 
        name="description" 
        required
      >
        {{ old('description') }}
      </textarea>
    </div>
    <div>
      <label for="price">Price</label>
      <input 
        type="number" 
        name="price" 
        value="{{ old('price') }}" 
        step=".01" 
        required 
      />
    </div>
    <div>
      <label for="medium">Medium</label>
      <input 
        type="text" 
        name="medium" 
        value="{{ old('medium') }}" 
        required 
      />
    </div>
    <div>
      <label for="surface">Surface</label>
      <input 
        type="text" 
        name="surface" 
        value="{{ old('surface') }}" 
        required 
      />
    </div>
    <div>
      <label for="stock">Stock</label>
      <input 
        type="number" 
        name="stock" 
        value="{{ old('stock') }}" 
        required 
      />
    </div>
    <div>
      <label for="size">Size</label>
      <input 
        type="text" 
        name="size" 
        value="{{ old('size') }}" 
        required 
      />
    </div>
    <div>
      <label for="year_of_creation">Year of Creation</label>
      <input 
        type="text" 
        name="year_of_creation" 
        value="{{ old('year_of_creation') }}" 
        required 
      />
    </div>
    <div>
      <label for="files">Choose photos</label>
      <input 
        type="file" 
        id="files" 
        name="files[]" 
        multiple 
      /> 
    </div>
    <button type="submit">Create</button>
  </form>
@endsection