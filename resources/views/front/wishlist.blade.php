@extends('layouts.front')
@section('title', "Wishlist - The Pacific Art Marketplace")
@section('main_content')
    <section class="container p-5 mt-16">
        @if($wishlist_items->count())
          <h2 class="section-heading">Your Wishlist</h2>
          <div>
            @foreach ($wishlist_items as $item)
                <section class="flex justify-center">
                    <article class="flex items-center gap-x-4 bg-gray-100 p-2 mb-2 rounded-md ">
                        <img src="{{ asset('uploads/' . $item->product->primary_image) }}" alt="product primary image" class="w-40 h-40 object-cover">
                        <div class="p-2">
                            <h3>{{ $item->product->title }}</h3>
                            <p>${{ $item->product->price }}</p>
                            <a href="{{ route('front.remove_from_wishlist', $item->product->id) }}"
                                    class="btn bg-red-300 hover:bg-red-400 mr-2">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            @livewire('add-to-cart', ['productId' => $item->product->id])
                        </div>
                    </article>
                </section>
            @endforeach
          </div>
        @else
            <h2 class="section-heading">Your wishlist is empty</h2>
        @endif
    </section>
@endsection