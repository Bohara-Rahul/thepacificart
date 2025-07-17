<div class="space-y-4 max-w-xl mx-auto">
    <h2 class="text-xl font-bold">Checkout</h2>

    <div class="space-y-6">
        @if (!auth()->check())
            <input type="email" wire:model="email" placeholder="Email Address" class="input w-full" />
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        @endif

        <h2 class="text-xl font-semibold">Billing Address</h2>
        @include('partials.address-form', ['model' => 'billing'])

        <div class="flex justify-between">
            <label>
                <input type="checkbox" wire:model="sameAsBilling">
                Shipping address same as billing?
            </label>
        </div>

        @if (!$sameAsBilling)
            <h2 class="text-xl font-semibold">Shipping Address</h2>
            @include('partials.address-form', ['model' => 'shipping'])
        @endif

        <button wire:click="placeOrder" class="bg-blue-600 text-white px-4 py-2 rounded">Place Order</button>
    </div>


    @if ($success)
        <div class="text-green-600">
            {{ $success }}
        </div>
    @endif
</div>
