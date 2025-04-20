<div class="mt-28 space-y-4 max-w-xl mx-auto mb-10">
    <h2>Register an account</h2>
    <form wire:submit.prevent="register" enctype="multipart/form-data">
        <div>
            <label for="name">Name:</label>
            <input type="text" wire:model.lazy="name" id="name" />
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="text" wire:model.lazy="email" id="email" />
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="password">Password:</label>
            <div class="flex items-center space-x-2">
                <input :type="$wire.showPassword ? 'text' : 'password'" wire:model.lazy="password" id="password" x-data
                    x-bind:type="$wire.showPassword ? 'text' : 'password'" />
                <button type="button" wire:click="toggleShowPassword" class="btn-outline">
                    {{ $showPassword ? 'Hide' : 'Show' }}
                </button>
            </div>
            @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="confirm_password">Confirm Password:</label>
            <div class="flex items-center space-x-2">
                <input :type="$wire.showConfirmPassword ? 'text' : 'password'" wire:model.lazy="confirmPassword" id="confirm_password" x-data
                x-bind:type="$wire.showConfirmPassword ? 'text' : 'password'" />
                <button type="button" wire:click="toggleShowConfirmPassword" class="btn-outline">
                    {{ $showConfirmPassword ? 'Hide' : 'Show' }}
                </button>
            </div>
            
            @error('password_confirmation')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Sign up</button>

    </form>

    <h3>Already have an account?
        <a class="underline" href="{{ route('user.login') }}">Login</a>
    </h3>
</div>
