
<section class="container mt-32 mb-10">
    @if (empty($cartItems))
        <h2 class="text-center">Your cart is empty. Please add items to cart</h2>
    @else
        <h2 class="text-3xl text-center mb-8">Your Cart</h2>
        @foreach ($cartItems as $item)
        <?php dd($item) ?>
            <div class="grid grid-cols-1 md:grid-cols-4 mb-5">
                <img src="{{ asset('user_pic.jpg') }}" class="w-28 h-28" />
                <div>
                    <h4 class="text-2xl">
                        {{ $item['product']['title'] ?? $item['title'] }}
                    </h4>
                    <div class="text-xl flex gap-x-5 items-center">
                        <button><i class="fa-solid fa-minus"></i></button>
                        <p>{{ $item['quantity'] }}</p>
                        <button><i class="fa-solid fa-plus"></i></button> 
                        {{-- <i class="fa-solid fa-trash ml-10 text-red-600" onclick="removeFromCart({{ $item['product']['id'] }})"></i> --}}
                    </div>
                    {{-- <button class="btn btn-danger" --}}
                        {{-- onclick="removeFromCart({{ $item['product']['id'] ?? $item['id'] }})"> --}}
                    {{-- > --}}
                    
                    {{-- </button> --}}
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
