@extends("layouts.front")

@section("main_content")
    <section class="mt-10">
        <h2 class="font-bold text-3xl">Featured Products</h2>
        <article class="flex justify-between">
            @foreach ($products as $product)
                <section>
                    <a href="{{ route('product_detail', $product->slug) }}">
                        <h3>{{ $product->title }}</h3>
                    </a>
                    <p>{!! $product->description !!}</p>
                    <p>{{ $product->medium }}</p>
                    <p>{{ $product->surface }}</p>
                    <p>{{ $product->size }}</p>
                </section>
            @endforeach
        </article>
    </section>
@endsection