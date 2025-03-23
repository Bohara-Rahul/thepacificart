@extends('layouts.other-page-layout')
@section('title', $product->title . ' - The Pacific Art Marketplace')
@section('main_content')
    <section class="container mt-32 mb-10">
        <div class="grid grid-cols-2 mt-10 gap-5">
            <div class="zoom-container">
                <div class="zoom-wrapper">
                    <img src="{{ asset('uploads/' . $product->primary_image) }}" class="zoomable-image" id='zoom-image' />
                </div>
            </div>
            <article class="flex flex-col justify-center">
                <div class="flex justify-between items-center">
                    <h3 class="text-2xl">{{ $product->title }}</h3>
                    <span class="text-xl font-bold">${{ $product->price }}</span>
                </div>

                <p>{!! $product->description !!}</p>
                <div class="flex flex-wrap gap-2 mb-5">
                    <span class="mr-auto">Medium: {{ ucfirst($product->medium) }}</span>
                    <span>Surface: {{ ucfirst($product->surface) }}</span>
                </div>
                <div class="flex flex-wrap gap-2 mb-5">
                    <span class="mr-auto">Size: {{ $product->size }}</span>
                    @if ($product->stock > 0)
                        <span class="bg-green-100 text-green-500 px-3 rounded-md">In Stock</span>
                    @else
                        <span class="bg-red-100 text-red-500 px-3">Out of Stock</span>
                    @endif
                </div>
                @if ($product->stock > 1)
                    <div class="flex flex-col gap-2 text-center">

                        <a href="{{ route('front.add_to_wishlist', $product->id) }}"
                            class="border border-gray-500 bg-gray-200 hover:bg-gray-100 p-1">
                            <button>
                                <i class="far fa-heart"></i>
                                Add to Wishlist
                            </button>
                        </a>
                        <a href="#" class="btn btn-secondary">
                            <button>
                                <i class="fas fa-shopping-cart"></i>
                                Add to cart
                            </button>
                        </a>
                        <a href="#" class="btn btn-primary">
                            <button>
                                <i class="fas fa-bag-shopping"></i>
                                Buy Now
                            </button>
                        </a>
                    </div>
                @endif
            </article>
        </div>
        <div class="flex space-x-2 mt-5 overflow-x-auto">
            @foreach ($product->photos as $photo)
                <a href="{{ asset('uploads/' . $photo->name) }}" data-lightbox="product-gallery">

                    <img src="{{ asset('uploads/' . $photo->name) }}" class="img-thumbnail mx-1"
                        style="width: 80px; height: 80px; cursor: pointer;" onclick="changeImage(this)" />

                </a>
            @endforeach
        </div>

    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            console.log('DOMContentLoaded')
            const zoomWrapper = document.querySelector(".zoom-wrapper");
            const zoomImage = document.getElementById("zoom-image");

            zoomWrapper.addEventListener("mousemove", function(e) {
                console.log('on mouse move')
                const {
                    left,
                    top,
                    width,
                    height
                } = zoomWrapper.getBoundingClientRect();
                console.log(left, top, width, height);
                const x = (e.clientX - left) / width * 100;
                const y = (e.clientY - top) / height * 100;
                console.log('x', x)
                console.log('y', y)

                zoomImage.style.transformOrigin = `${x}% ${y}%`;
                zoomImage.style.transform = "scale(2)"; // Zoom level
            });

            zoomWrapper.addEventListener("mouseleave", function() {
                zoomImage.style.transform = "scale(1)"; // Reset zoom when leaving
            });

            window.changeImage = function(el) {
                console.log(el)
                zoomImage.src = el.src;
                zoomImage.style.transform = "scale(1)"; // Reset zoom when image changes
            };
        });
    </script>
@endsection
