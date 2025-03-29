<section class="container mt-32 mb-10">
    @if (empty($cartItems))
        <h2 class="text-center">Your cart is empty. Please add items to cart</h2>
    @else
    <h2 class="text-3xl mb-4">Your Cart</h2>
        @foreach ($cartItems as $item)
            <div class="grid grid-cols-1 md:grid-cols-4 mb-5">
                <img src="{{ asset('user_pic.jpg') }}" class="w-28 h-28" />
                <div>
                    <h4 class="text-2xl">
                        {{ $item['product']['title'] ?? $item['title'] }}
                    </h4>
                    <div class="text-xl flex gap-x-5">
                        <button><i class="fa-solid fa-minus"></i></button>
                        <p>{{ $item['quantity'] }}</p>
                        <button><i class="fa-solid fa-plus"></i></button>
                    </div>
                    <button class="btn btn-danger">Remove</button>
                </div>
                <div>
                    <p>Price Per Unit</p>
                    <p>${{ $item['product']['price'] ?? $item['price'] }}</p>
                </div>
                <div>
                    <p>Total Price</p>
                    <p>${{ ($item['product']['price'] ?? $item['price']) * $item['quantity'] }}</p>
                </div>
            </div>

            </div>
            <hr class="mb-5" />
        @endforeach
        
    @endif

    {{-- <a href="{{ route('checkout') }}">Proceed to Checkout</a> --}}
</section>
