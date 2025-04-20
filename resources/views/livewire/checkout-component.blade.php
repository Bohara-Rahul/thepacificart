<div class="space-y-4 max-w-xl mx-auto">
    <h2 class="text-xl font-bold">Checkout</h2>

    <form wire:submit.prevent="placeOrder">
        <input type="email" wire:model="email" class="w-full p-2 border rounded" placeholder="Your email" />
        <h2>Billing Address</h2>
        <input type="text" wire:model="shipping_name" placeholder="Full Name" class="w-full p-2 border rounded" />
        <input type="text" wire:model="shipping_address" placeholder="Address" class="w-full p-2 border rounded" />
        <input type="text" wire:model="shipping_city" placeholder="City" class="w-full p-2 border rounded" />
        <input type="text" wire:model="shipping_zip" placeholder="ZIP Code" class="w-full p-2 border rounded" />
        <input type="text" wire:model="shipping_country" placeholder="Country" class="w-full p-2 border rounded" />

        {{-- <h2>Postal Address</h2>
        <input type="text" wire:model="shipping_name" placeholder="Full Name" class="w-full p-2 border rounded" />
        <input type="text" wire:model="shipping_address" placeholder="Address" class="w-full p-2 border rounded" />
        <input type="text" wire:model="shipping_city" placeholder="City" class="w-full p-2 border rounded" />
        <input type="text" wire:model="shipping_zip" placeholder="ZIP Code" class="w-full p-2 border rounded" />
        <input type="text" wire:model="shipping_country" placeholder="Country" class="w-full p-2 border rounded" /> --}}
        {{-- <label>Select Payment Method:</label>
        <input type="radio" wire:model="paymentMethod" value="stripe"> Direct Deposit
        <input type="radio" wire:model="paymentMethod" value="paypal"> PayPal --}}

        <button type="submit" class="btn btn-primary">Pay Now</button>
    </form>

    @if ($success)
        <div class="text-green-600">
            {{ $success }}
        </div>
    @endif
</div>
