<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
        <input type="text" wire:model="{{ $model }}.full_name" placeholder="Full Name" class="input w-full" />
        @error($model . '.full_name')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <input type="text" wire:model="{{ $model }}.street" placeholder="Street Address" class="input w-full" />
        @error($model . '.street')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <input type="text" wire:model="{{ $model }}.city" placeholder="City" class="input w-full" />
        @error($model . '.city')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <input type="text" wire:model="{{ $model }}.state" placeholder="State" class="input w-full" />
        @error($model . '.state')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <input type="text" wire:model="{{ $model }}.postal_code" placeholder="Postal Code"
            class="input w-full" />
        @error($model . '.postal_code')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <input type="text" wire:model="{{ $model }}.country" placeholder="Country" class="input w-full" />
        @error($model . '.country')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>
</div>
