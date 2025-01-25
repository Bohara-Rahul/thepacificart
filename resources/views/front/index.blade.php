@extends("layouts.front")
@section("main_content")
@include('front.components.hero-section')
    <section class="mt-32 bg-slate-100 text-black p-5">
        <h3 class="section-heading">
            Why Choose Us?
        </h3>
        <ul class="flex flex-wrap place-content-center text-xl text-gray-900 font-bold gap-10">
            <li>
                <i class="fa-solid fa-star"></i>
                Premium Arts
            </li>
            <li>
                <i class="fa-solid fa-truck"></i>
                Faster Delivery
            </li>
            <li>
                <i class="fa-solid fa-phone"></i>
                24x7 support
            </li>
        </ul>
    </section>
    <section class="mt-28">
        <h2 class="section-heading mb-10">Featured Products</h2>
        <article 
            class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-3 gap-5"
        >
            @foreach ($products as $product)
                <x-card>
                    <section>
                        <a 
                            href="{{ route('product_detail', $product->slug) }}"
                        >
                            <h3 class="text-2xl">{{ $product->title }}</h3>
                  
                        </a>
                        @if ($product->photos)
                            <article>
                                <img 
                                src="{{ asset('uploads/'.$product->photos[0]->name) }}"
                                alt="product image"
                                class="product-image" 
                            />
                            </article>                                 
                        @endif
                            <article class="flex justify-between items-center mt-2">
                                <a href="#"><p>ADD TO WISHLIST</p></a>
                                <a href="#"><p>ADD TO CART</p></a>
                            <article>
                        </section>
                    </x-card>
            @endforeach
        </article>
    </section>
    <section class="mt-32 bg-slate-100 text-black p-5">
        <h3 class="section-heading">
            Browse more categories
        </h3>
        <ul class="flex flex-wrap place-content-center">
            @foreach ($categories as $category)
                <a href="{{ route('category_detail', $category->slug) }}">
                    <li class="bg-gray-600 text-white p-2 border-2 rounded-lg">
                        {{ $category->title }}
                    </li>
                </a>
            @endforeach
        </ul>
    </section>
@include("front.components.testimonials")
@endsection