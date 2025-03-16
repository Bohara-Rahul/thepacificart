@extends('admin.layout.admin-layout')
@section('main_content')
@include('admin.layout.sidebar')
    
    <form action="{{ route('admin_products_create_submit') }}" method="POST" enctype="multipart/form-data">
        <h3>Please enter the details to add the art</h3>
        @csrf
        <article class="grid grid-cols-1 md:grid-cols-2 gap-2">
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" required />
            </div>
            <div>
                <label for="price">Price</label>
                <input type="number" name="price" value="{{ old('price') }}" step=".01" required />
            </div>
        </article>
        <article class="grid grid-cols-1 md:grid-cols-2 gap-2">
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
        </article>

        <div>
            <label for="description">Description</label>
            <input id="description" type="hidden" name="description">
            <trix-editor input="description"></trix-editor>
        </div>
        <article class="grid grid-cols-1 md:grid-cols-2 gap-2">
            <div>
                <label for="medium">Medium</label>
                <input type="text" name="medium" value="{{ old('medium') }}" required />
            </div>
            <div>
                <label for="surface">Surface</label>
                <input type="text" name="surface" value="{{ old('surface') }}" required />
            </div>
        </article>
        <article class="grid grid-cols-1 md:grid-cols-2 gap-2">
            <div>
                <label for="stock">Stock</label>
                <input type="number" name="stock" value="{{ old('stock') }}" required />
            </div>
            <div>
                <label for="size">Size</label>
                <input type="text" name="size" value="{{ old('size') }}" required />
            </div>
        </article>
            <p>Is BestSeller?</p>
            <div class="grid grid-cols-2">
                <div class="grid grid-cols-2">
                    <label for="isBestSeller">Yes</label>
                    <input value="1" type="radio" id="isBestSeller" name="isBestSeller" />         
                </div>
                <div class="grid grid-cols-2">
                    <label for="isBestSeller">No</label>
                    <input value="0" type="radio" id="isBestSeller" name="isBestSeller" />        
                </div>
            </div>
        <article class="grid grid-cols-1 md:grid-cols-2 gap-2">
            <div>
                <label for="year_of_creation">Year of Creation</label>
                <input type="text" name="year_of_creation" value="{{ old('year_of_creation') }}" required />
            </div>
        </article>

        <article class="grid grid-cols-1 md:grid-cols-2 gap-2">
            <div>
                <label for="primaryImage">Primary Photo</label>
                <input required type="file" id="primaryImage" name="primary_image" />
            </div>
            <div>
                <label for="files">Choose photos</label>
                <input required type="file" id="files" name="files[]" multiple />
            </div>
        </article>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>

    <!-- validation errors -->
    @if ($errors->any())
        <ul class="max-w-2xl px-4 py-2 bg-red-100">
            @foreach ($errors->all() as $error)
                <li class="my-2 text-red-500">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    @endif

@endsection
