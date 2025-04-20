<section class="container mt-32 mb-20">
    @if (empty($cartItems))
        <h2 class="text-center">Your cart is empty. Please add items to cart</h2>
    @else
        <h2 class="text-3xl text-center mb-8">Your Cart</h2>
        @foreach ($cartItems as $item)
            <div class="grid grid-cols-1 md:grid-cols-5 mb-5">
                <img src="{{ asset('uploads/' . $item['primary_image']) }}" class="w-28 h-28" />
 
                <div class="flex justify-start items-center">
                    <h4 class="text-2xl">
                        {{ $item['title'] }}
                    </h4>
                    <i class="fa-solid fa-trash ml-10 text-red-600 hover:cursor-pointer" wire:click="removeFromCart({{ $item['product_id'] }})"></i>
                </div>
                <div>
                    <p>Qty</p>
                    <p>{{ $item['quantity'] }}</p>
                </div>
                <div>
                    <p>Price Per Unit</p>
                    <p>${{ $item['price'] }}</p>
                </div>
                <div>
                    <p>Total Price</p>
                    <p>${{ number_format($item['price'] * $item['quantity'], 2) }}</p>
                </div>
            </div>
            <hr class="mb-5" />
        @endforeach
        </div>
    @endif
    @if ($cartCount > 0)
        <div class="flex flex-col items-end mr-44">
            <p class="p-2 mb-5 border border-gray-400">
                Subtotal ({{ $cartCount }}) {{ $cartCount > 1 ? 'items' : 'item' }}:
                ${{ number_format($subTotal, 2) }}
            </p>
            <div class="flex flex-col">
                @auth
                    <a href="{{ route('checkout') }}" class="btn btn-secondary">Proceed to Checkout</a>
                @else
                    <a href="{{ route('checkout') }}" class="btn btn-accent mb-2">
                        Checkout as a Guest
                    </a>
                @endauth

            </div>

        </div>
    @endif
</section>
