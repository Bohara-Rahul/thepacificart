<header>
    <div id="nav-bar" class="navigation-container fixed transition-transform duration-300 w-full z-50">
        <nav class="navbar">
            <a href="/">
                <img src="{{ asset('logo_3.png') }}" alt="logo" style="height: 100px; object-fit: cover;" />
            </a>

            <ul class="flex justify-between gap-5">
                <li class="{{ request()->routeIs('front.home') ? 'nav-active' : '' }}">
                    <a href="{{ route('front.home') }}">Home</a>
                </li>
                <li class="{{ request()->routeIs('front.gallery') || request()->routeIs('product_detail') ? 'nav-active' : '' }}">
                    <a href="{{ route('front.gallery') }}">Gallery</a>
                </li>
                <li class="{{ request()->routeIs('front.artists') || request()->routeIs('front.artist_detail') ? 'nav-active' : '' }}">
                    <a href="{{ route('front.artists') }}">Artists</a>
                </li>
                <li class="{{ request()->routeIs('front.whats-new') ? 'nav-active' : '' }}">
                    <a href="{{ route('front.whats-new') }}">What's New</a>
                </li>
            </ul>

            <ul class="flex justify-between gap-5 items-center text-xl">
                @auth
                    <li class="{{ request()->routeIs('front.wishlist') ? 'nav-active' : '' }}">
                        <a href="{{ route('front.wishlist') }}">
                            Wishlist ({{ $wishlistCount }})
                        </a>
                    </li>
                @endauth

                <li class="{{ request()->routeIs('front.cart') ? 'nav-active' : '' }}">
                    <a href="{{ route('front.cart') }}">
                        Cart ({{ $cartCount }})
                    </a>
                </li>

                @auth
                    <li class="{{ request()->routeIs('user.dashboard') ? 'nav-active' : '' }}">
                        <a href="{{ route('user.dashboard') }}">Dashboard</a>
                    </li>
                @else
                    <li class="{{ request()->routeIs('user.register') ? 'nav-active' : '' }}">
                        <a href="{{ route('user.register') }}">Register/Login</a>
                    </li>
                @endauth
            </ul>
        </nav>
    </div>
</header>
