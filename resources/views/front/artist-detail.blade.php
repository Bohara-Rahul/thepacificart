@extends('layouts.other-page-layout')
@section('title', "What's New - The Pacific Art Marketplace")
@section('main_content')
    <section class="container p-5 mt-20 ">
        <div class="flex flex-wrap gap-5">
            <article class="w-72">
                <img class="rounded-sm" src="{{ asset('user_pic.jpg') }}" alt="{{ $artist->name }}" />
            </article>
            <article class="">
                <h2 class="text-2xl">{{ $artist->name }}</h2>
                <p class="max-w-5xl">{{ $artist->bio }}</p>
                <p>Based in <span class="font-bold text-xl">{{ $artist->location }}</span></p>
                <button class="btn btn-primary inline">
                    <i class="fa-solid fa-user-plus"></i> Follow
                </button>
            </article>
        </div>
        <div>
            <h3 class="text-center text-2xl font-bold">Arts by {{ $artist->name }}</h3>
            <section class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 p-5">
                @foreach ($arts as $art)
                    <article class="p-5">
                        <div class="overflow-hidden bg-blue-300">
                            <img src="{{ asset('uploads/' . $art->primary_image) }}" alt="{{ $art->title }}"
                                class="max-w-sm rounded-md" />
                        </div>
                        <div class="flex justify-between items-center">
                            <h3>{{ $art->title }}</h3>
                            <p class="text-gray-400">
                                @if ($art->stock > 0)
                                    In Stock
                                @else
                                    Out of Stock
                                @endif
                            </p>
                        </div>

                        <p>{!! $art->description !!}</p>
                        <div class="flex flex-wrap gap-2">
                            <p>Price: ${{ $art->price }}</p>
                            <p>Medium: {{ $art->medium }}</p>
                            <p>Surface: {{ $art->surface }}</p>
                            <p>Size: {{ $art->size }}</p>
                            </p>
                        </div>
                        <div class="flex gap-2">
                            <p>Add to Wishlist</p>
                            <button class="btn btn-secondary">Add to cart</button>
                        </div>
                        <button class="btn btn-primary">Buy Now</button>
                    </article>
                @endforeach
            </section>
        </div>

    </section>
@endsection
