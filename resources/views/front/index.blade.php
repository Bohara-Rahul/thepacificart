@extends("layouts.front")

@section("main_content")
    <h2>Products</h2>
    <div class="row">
        @foreach ($products as $product)
            <div style="background-color: ghostwhite; padding: 10px;">
                <a href="{{ route('product_detail', $product->slug) }}">
                    <h3>{{ $product->title }}</h3>
                </a>
                <p>{!! $product->description !!}</p>
            </div>
        @endforeach
    </div>
@endsection