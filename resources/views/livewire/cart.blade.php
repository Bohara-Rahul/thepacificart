<section class="container mt-32 mb-10">
    <h2>Your Cart</h2>

    @if(empty($cartItems))
        <p>Your cart is empty.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $item)
                    <tr>
                        <td>{{ $item['product']['title'] ?? $item['title'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>${{ $item['product']['price'] ?? $item['price'] }}</td>
                        <td>${{ ($item['product']['price'] ?? $item['price']) * $item['quantity'] }}</td>
                        <td>
                            <button wire:click="removeFromCart({{ $item['product_id'] ?? $loop->index }})">Remove</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    {{-- <a href="{{ route('checkout') }}">Proceed to Checkout</a> --}}
</section>

