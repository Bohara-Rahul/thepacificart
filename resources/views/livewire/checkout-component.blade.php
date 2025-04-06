<div class="space-y-4 max-w-xl mx-auto">
    <h2 class="text-xl font-bold">Checkout</h2>

    @if (!Auth::check())
        <input type="email" wire:model="email" placeholder="Your Email" class="w-full p-2 border rounded" />
    @endif

    <input type="text" wire:model="shipping_name" placeholder="Full Name" class="w-full p-2 border rounded" />
    <input type="text" wire:model="shipping_address" placeholder="Address" class="w-full p-2 border rounded" />
    <input type="text" wire:model="shipping_city" placeholder="City" class="w-full p-2 border rounded" />
    <input type="text" wire:model="shipping_zip" placeholder="ZIP Code" class="w-full p-2 border rounded" />
    <input type="text" wire:model="shipping_country" placeholder="Country" class="w-full p-2 border rounded" />

    <button wire:click="placeOrder" class="bg-green-500 text-white px-4 py-2 rounded">Place Order</button>

    @if ($success)
        <div class="text-green-600">{{ $success }}</div>
    @endif
</div>
