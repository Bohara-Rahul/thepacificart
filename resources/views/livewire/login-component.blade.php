<div class="mt-28 mb-10 space-y-4 max-w-xl mx-auto">
    <h2>Login to your account</h2>
    <form wire:submit.prevent="login" enctype="multipart/form-data">
        <div>
            <label for="email">Email:</label>
            <input type="text" wire:model.lazy="email" id="email" name="email" />
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="password">Password:</label>
            <div class="flex items-center space-x-2">
                <input :type="$wire.showPassword ? 'text' : 'password'" wire:model.lazy="password" id="password" x-data
                    x-bind:type="$wire.showPassword ? 'text' : 'password'" name="password" />
                <button type="button" wire:click="toggleShowPassword" class="btn-outline">
                    {{ $showPassword ? 'Hide' : 'Show' }}
                </button>
            </div>
            @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>

    <h3>No account? <a href="{{ route('user.register') }}" class="underline">Sign up here</a></h3>
    
</div>
