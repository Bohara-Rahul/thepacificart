@extends("layouts.front")

@section("main_content")
    <section class="mt-10">
        <h2 class="font-bold text-3xl">Featured Products</h2>
        <article 
            class="grid sm:grid-cols-1 md:grid-cols-3 xl:grid-cols-4 gap-5"
        >
            @foreach ($products as $product)
                    <x-card>
                        <div>
                            <a href="{{ route('product_detail', $product->slug) }}">
                                <h3 class="text-center">
                                    {{ $product->title }}
                                </h3>
                            </a>
                            @if ($product->photos)
                                @foreach ($product->photos as $photo)
                                <img 
                                    src="{{ asset('uploads/'.$photo->name) }}"
                                    alt="product image" 
                                />   
                                @endforeach
                            @else
                                
                            @endif
                            <p>{{ $product->category->title }}</p>
                        </div>
                    </x-card>
            @endforeach
        </article>
    </section>
@endsection