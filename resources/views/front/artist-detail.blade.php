@extends('layouts.other-page-layout')
@section('title', "What's New - The Pacific Art Marketplace")
@section('main_content')
    <section class="container p-5 mt-28">
        <div class="flex flex-wrap justify-center gap-5 mb-10">
            <article>
                <img 
                    class="rounded-full w-80 h-80" 
                    src="{{ asset('user_pic.jpg') }}" 
                    alt="{{ $artist->name }}" 
                />
            </article>
            <article class="flex flex-col justify-center gap-x-10">
                <h2 class="text-3xl">{{ $artist->name }}</h2>
                <p class="max-w-5xl">{{ $artist->bio }}</p>
                <p>Based in <span class="font-bold text-xl">{{ $artist->location }}</span></p>
                <button class="btn btn-secondary">
                    <i class="fa-solid fa-user-plus"></i> Follow
                </button>
            </article>
        </div>
        <div>
            <h3 class="section-heading">
                Arts by {{ $artist->name }}
            </h3>
            <section class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 p-5">
                @foreach ($arts as $art)
                    <article class="p-5 border border-gray-400 rounded-md">
                        <div class="overflow-hidden">
                            <img 
                                src="{{ asset('uploads/' . $art->primary_image) }}" 
                                alt="{{ $art->title }}"
                                class="rounded-md" 
                            />
                        </div>
                        <div class="flex justify-between items-center">
                            <h3>{{ $art->title }}</h3>
                            <span class="font-bold">${{ $art->price }}</span>
                        </div>

                        <p>{!! $art->description !!}</p>
                        <div class="flex flex-wrap gap-2 mb-5">
                            <span class="mr-auto">Medium: {{ ucfirst($art->medium) }}</span>
                            <span>Surface: {{ ucfirst($art->surface) }}</span>
                            <span class="mr-auto">Size: {{ $art->size }}</span>
                            @if ($art->stock > 0)
                              <span class="text-green-500">In Stock</span>  
                            @else
                              <span class="text-gray-300">Out of Stock</span>   
                            @endif
                        </div>
                        <div class="flex flex-col gap-2">
                            <button class="border border-gray-500 hover:bg-gray-200 p-1">
                                Add to Wishlist
                            </button>
                            <button class="btn btn-secondary">
                                Add to cart
                            </button>
                            <button class="btn btn-primary">Buy Now</button>
                        </div>
                    </article>
                @endforeach
            </section>
        </div>

    </section>
@endsection
