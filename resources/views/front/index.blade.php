@extends("layouts.front")
@section("main_content")
@include('front.components.hero-section')
    <section class="mt-10">
        <h2 class="font-extrabold text-4xl">Featured Products</h2>
        <article 
            class="grid sm:grid-cols-1 md:grid-cols-3 xl:grid-cols-4 gap-5"
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
@endsection