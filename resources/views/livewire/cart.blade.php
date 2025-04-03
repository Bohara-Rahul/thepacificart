<section class="container mt-32 mb-20">
    @if (empty($cartItems))
        <h2 class="text-center">Your cart is empty. Please add items to cart</h2>
    @else
        <h2 class="text-3xl text-center mb-8">Your Cart</h2>
        {{-- {{ dd($cartItems) }} --}}
        @foreach ($cartItems as $item)
            {{-- {{ dd($item) }} --}}
            <div class="grid grid-cols-1 md:grid-cols-4 mb-5">
                @auth
                    <img src="{{ asset('uploads/' . $item['product']['primary_image']) }}" class="w-28 h-28" />
                @endauth
                @guest
                    <img src="{{ asset('uploads/' . $item['primary_image']) }}" class="w-28 h-28" />
                @endguest

                <div>
                    <h4 class="text-2xl">
                        {{ $item['product']['title'] ?? $item['title'] }}
                    </h4>
                    <div class="text-xl flex gap-x-5 items-center">
                        <button wire:click="decreaseQuantity({{ $item['product_id'] }})">
                            <i class="fa-solid fa-minus"></i>
                        </button>
                        <p>{{ $item['quantity'] }}</p>
                        <button wire:click="addToCart({{ $item['product_id'] }})"><i
                                class="fa-solid fa-plus"></i></button>
                        <i class="fa-solid fa-trash ml-10 text-red-600 hover:cursor-pointer"
                            wire:click="removeFromCart({{ $item['product_id'] }})"></i>
                    </div>

                </div>
                <div>
                    <p>Price Per Unit</p>
                    <p>${{ $item['product']['price'] ?? $item['price'] }}</p>
                </div>
                <div>
                    <p>Total Price</p>
                    <p>${{ number_format(($item['price'] ?? $item['product']['price']) * $item['quantity'], 2) }}</p>
                </div>
                <!-- $item['product']['price'] ??
                $item['product']['price'] ?? -->
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
                    <a href="{{ route('user.login') }}?redirect_to={{ urlencode(route('checkout')) }}" class="btn btn-primary">Login to Checkout</a>
                @endauth

            </div>

        </div>
    @endif
</section>
