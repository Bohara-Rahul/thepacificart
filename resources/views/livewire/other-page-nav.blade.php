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
                     <a href="{{ route('front.cart') }}">
                         Wishlist ({{ $wishlistCount }})
                     </a>
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
     </nav>
 </div>
