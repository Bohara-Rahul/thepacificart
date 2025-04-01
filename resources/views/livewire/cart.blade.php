
<section class="container mt-32 mb-10">
    @if (empty($cartItems))
        <h2 class="text-center">Your cart is empty. Please add items to cart</h2>
    @else
        <h2 class="text-3xl text-center mb-8">Your Cart</h2>
        @foreach ($cartItems as $item)
            <div class="grid grid-cols-1 md:grid-cols-4 mb-5">
                <img src="{{ asset('user_pic.jpg') }}" class="w-28 h-28" />
                <div>
                    <h4 class="text-2xl">
                        {{ $item['title'] }}
                        <!-- $item['product']['title'] ?? -->
                    </h4>
                    <div class="text-xl flex gap-x-5 items-center">  
                        <button wire:click="decreaseQuantity({{ $item['product_id'] }})">
                                <i class="fa-solid fa-minus"></i>
                        </button>
                        <p>{{ $item['quantity'] }}</p>
                        <button wire:click="addToCart({{ $item['product_id'] }})"><i class="fa-solid fa-plus"></i></button> 
                        <i class="fa-solid fa-trash ml-10 text-red-600 hover:cursor-pointer" wire:click="removeFromCart({{ $item['product_id'] }})"></i> 
                    </div>

                </div>
                <div>
                    <p>Price Per Unit</p>
                    <p>${{ $item['price'] }}</p>
                </div>
                <div>
                    <p>Total Price</p>
                    <p>${{ $item['price'] * $item['quantity'] }}</p>
                </div>
                <!-- $item['product']['price'] ??
                $item['product']['price'] ?? -->
            </div>

            </div>
            <hr class="mb-5" />
        @endforeach

    @endif

    {{-- <a href="{{ route('checkout') }}">Proceed to Checkout</a> --}}
</section>
