@extends('admin.layout.admin-layout')
@section('main_content')
    @include('admin.layout.sidebar')
    <section>
        <h2>Edit Product</h2>
        <section>
            <article>
                @if ($product->primary_image)
                    <p>Primary Photo</p>
                    <aside>
                        <img src="{{ asset('uploads/' . $product->primary_image) }}" alt="{{ $product->title }}"
                            class="w-[200px] h-auto" />
                        <form action="{{ route('admin_photo_delete', $product->primary_image) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </aside>
                @endif
            </article>

            <article class="flex">
                @if ($product->photos->count() > 0)
                    <p>Current Photos</p>
                    @foreach ($product->photos as $photo)
                        <aside>
                            <img src="{{ asset('uploads/' . $photo->name) }}" alt="{{ $product->title }}"
                                class="w-[200px] h-auto" />
                            <form action="{{ route('admin_photo_delete', $photo) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </aside>
                    @endforeach
                @endif
            </article>

        </section>

        <form action="{{ route('admin_products_edit_submit', $product->id) }}" method="POST" enctype="multipart/form-data"
            class="mb-5">
            @csrf
            @method('PUT')
            <div>
                <label for="files">Add photo:</label>
                <input type="file" id="files" name="files[]" multiple />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                <div>
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" value="{{ $product->title }}" />
                </div>
                <div>
                    <label for="price">Price:</label>
                    <input type="number" id="price" name="price" value="{{ $product->price }}" />
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                <div>
                    <label for="artist_id">Artist</label>
                    <select name="artist_id" id="artist_id" required>
                        <option value="" disabled selected>
                            Select an artist
                        </option>
                        @foreach ($artists as $artist)
                            <option value="{{ $artist->id }}" {{ $artist->id == $product->artist_id ? 'selected' : '' }}>
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
                            <option value="{{ $category->id }}"
                                {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                {{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <label for="description">Description:</label>
                <textarea name="description" id="description" rows="10">
        {{ $product->description }}
      </textarea>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                <div>
                    <label for="medium">Medium:</label>
                    <input type="text" id="medium" name="medium" value="{{ $product->medium }}" />
                </div>
                <div>
                    <label for="surface">Surface:</label>
                    <input type="text" id="surface" name="surface" value="{{ $product->surface }}" />
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                <div>
                    <label for="stock">Stock:</label>
                    <input type="text" id="stock" name="stock" value="{{ $product->stock }}" />
                </div>
                <div>
                    <label for="size">Size:</label>
                    <input type="text" id="size" name="size" value="{{ $product->size }}" />
                </div>
            </div>

            <div class="w-40">
                <label for="year_of_creation">Year_of_creation:</label>
                <input type="text" id="year_of_creation" name="year_of_creation"
                    value="{{ $product->year_of_creation }}" />
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
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
    </section>
@endsection
