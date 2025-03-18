<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Add to your <head> section -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/3.0.8/jquery.elevatezoom.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

    <title>@yield('title', 'The Pacific Art - Art Marketplace')</title>

    @vite('resources/css/app.css')
</head>

<body>

    @if (session()->has('success'))
        <div class="container">
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if (session()->has('failure'))
        <div class="container">
            <div class="alert alert-danger text-center">
                {{ session('failure') }}
            </div>
        </div>
    @endif

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

    <div class="navigation-container hide" id="left-logo-nav">
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
    </div>
    <main>
        @yield('main_content')
    </main>

    @include('front.components.footer')

    @vite('resources/js/app.js')
</body>

</html>
