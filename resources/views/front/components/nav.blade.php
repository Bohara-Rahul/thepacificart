<header id="header" class="header mt-20">
    <video muted autoplay loop poster="{{ asset('hero-img.png') }}">
        <source src="{{ asset('bg-video.MOV') }}" />
    </video>
    <div class="navigation-container fixed bg-[#13292a]" id="nav-container">
        <nav class="navbar" id="nav-bar">
            <a href="/">
                <img src="{{ asset('logo_3.png') }}" alt="logo" style="height: 100px; object-fit: cover;" />
            </a>
            <ul class="flex justify-between gap-5">
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
            </ul>
            <ul class="flex justify-between gap-5 items-center text-xl">
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
                        {{-- <a href="#"> --}}
                            {{-- <i class="fa-solid fa-cart-shopping"></i> --}}
                            {{-- <span
                                class='absolute -top-3 -right-3 bg-white text-black rounded-full h-6 w-6 flex items-center justify-center text-xs'>2</span> --}}
                        {{-- </a> --}}
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
        </nav>
    </div>

    {{-- <div class="navigation-container hide" id="left-logo-nav">
        <nav class="left-navbar" id="left-nav-bar">
            <a href="/">
                <img src="{{ asset('logo_3.png') }}" alt="logo" style="height: 100px; object-fit: cover;" />
            </a>
            <ul class="flex justify-between gap-5">
                <li class="{{ Request::is('/') ? 'nav-active' : '' }}">
                    <a href="{{ route('front.home') }}">What's New</a>
                </li>
                <li class="{{ Request::is('/') ? 'nav-active' : '' }}">
                    <a href="{{ route('front.home') }}">Home</a>
                </li>
                <li class="{{ Request::is('/gallery') ? 'nav-active' : '' }}">
                    <a href="{{ route('front.gallery') }}">Gallery</a>
                </li>
                <li class="{{ Request::is('/artists') ? 'nav-active' : '' }}">
                    <a href="{{ route('front.artists') }}">Artists</a>
                </li>
                <li class="{{ Request::is('/about-us') ? 'nav-active' : '' }}">
                    <a href="{{ route('front.about-us') }}">About Us</a>
                </li>
            </ul>
            <ul class="flex justify-between gap-5 items-center text-xl">
                <li>
                    <i class="fa-regular fa-heart"></i>
                </li>
                <li>
                    <button class="flex justify-center items-center relative">
                        <a href="#" class="bg-black">
                            <i class="fa-light fa-cart-shopping"></i>
                            <span
                                class='absolute -top-3 -right-3 bg-white text-black rounded-full h-6 w-6 flex items-center justify-center text-xs'>2</span>
                        </a>
                    </button>
                </li>
                <li>
                    @auth
                        <li>
                            <a href="{{ route('user.dashboard') }}">Dashboard</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('user.register') }}">Register/Login</a>
                        </li>
                    @endauth
                </li>
            </ul>
        </nav>
    </div> --}}

</header>
