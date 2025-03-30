@extends('admin.layout.admin-layout')
@section('main_content')
@include('admin.layout.sidebar')
    <section>
        <h2>Edit Product</h2>
        <section>
            <article class="flex">
                {{-- @if ($product->photos->count() > 0)
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
                @endif --}}
            </article>

        </section>

        <form action="{{ route('admin_blogs_edit_submit', $blog->slug) }}" method="POST" enctype="multipart/form-data"
            class="mb-5">
            @csrf
            @method('PUT')
            <div>
                @if ($blog->primary_image)
                    <img src="{{ asset('uploads/' . $blog->primary_image) }}" alt="{{ $blog->title }}" class="w-[150px]" />
                    <label for="primary_image">Change primary photo:</label>
                    <input type="file" id="primary_image" name="primary_image" />
                @endif
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                <div>
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" value="{{ $blog->title }}" />
                </div>
                <div>
                  <div>
                    <label for="content">Content:</label>
                    <!-- Textarea for Trix Editor -->
                    <input 
                        id="content" 
                        name="content"
                        value="{{ $blog->content }}" 
                        type="hidden"
                    />    
                    <trix-editor input="content"></trix-editor>
                </div>
                </div>
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
