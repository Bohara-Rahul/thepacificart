<div x-data="{ open: false }" class="relative text-2xl">
    <!-- Toggle Button -->
    <button class="p-2 focus:outline-none text-gray-300" @click="open = !open" aria-label="Toggle Menu">
        <template x-if="open">
            <span>✖️</span>
        </template>
        <template x-if="!open">
            <span>☰</span>
        </template>
    </button>

    <!-- Backdrop -->
    <div x-show="open" @click="open = false" class="fixed inset-0 bg-black bg-opacity-50 z-40" x-transition.opacity
        style="display: none;"></div>

    <!-- Mobile Menu Dropdown -->
    <div x-show="open" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4"
        class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg p-4 z-50" style="display: none;">
        <span class="absolute right-5 hover:cursor-pointer" @click="open = false">X</span>
        <ul class="flex flex-col">
            <li class="{{ request()->routeIs('front.home') ? 'nav-active' : '' }}">
                <a href="{{ route('front.home') }}">Home</a>
            </li>
            <li
                class="{{ request()->routeIs('front.gallery') || request()->routeIs('product_detail') ? 'nav-active' : '' }}">
                <a href="{{ route('front.gallery') }}">Gallery</a>
            </li>
            <li
                class="{{ request()->routeIs('front.artists') || request()->routeIs('front.artist_detail') ? 'nav-active' : '' }}">
                <a href="{{ route('front.artists') }}">Artists</a>
            </li>
            <li class="{{ request()->routeIs('front.whats-new') ? 'nav-active' : '' }}">
                <a href="{{ route('front.whats-new') }}">What's New</a>
            </li>
            @auth
                <li>
                    <i class="fa-regular fa-heart"></i>
                </li>
            @endauth
            <li>
                <button class="flex justify-center items-center relative">
                    <a href="{{ route('front.cart') }}">
                        Cart ({{ count(session('cart', [])) }})
                    </a>
                </button>
            </li>
            @auth
                <li>
                    <a href="{{ route('user.dashboard') }}">Dashboard</a>
                </li>
            @else
                <li>
                    <a href="{{ route('user.register') }}">Register/Login</a>
                </li>
            @endauth
        </ul>
    </div>
</div>
