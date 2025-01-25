<header class="fixed top-0 left-0 right-0">
<nav class="container flex justify-between items-center text-xl">
  <ul class="flex justify-between gap-5">
    <li class="{{ Request::is('/') ? 'nav-active' : '' }}">
      <a href="{{ route('front.home') }}">Home</a>
    </li>
    <li class="{{ Request::is('/arts') ? 'nav-active' : '' }}">
      <a href="{{ route('front.arts') }}">Arts</a>
    </li>
    <li class="{{ Request::is('/artists') ? 'nav-active' : '' }}">
      <a href="{{ route('front.artists') }}">Artists</a>
    </li>
  </ul>
  <div>
    <a href="/">
      <img src="{{ asset('logo.png') }}" alt="logo" style="height: 140px; object-fit: cover;" />
    </a>
  </div>
  <ul class="flex justify-between gap-5 items-center text-xl">
    <form>
      <div class="flex justify-center items-center">
        <i class="fas fa-search"></i>
      </div>   
    </form>
    <li>
      <i class="fa-regular fa-heart"></i>
    </li>
    <li>
      <button class="flex justify-center items-center relative">
        <a href="#" class="bg-black">
          <i class="fa-light fa-cart-shopping"></i>
          <span class='absolute -top-3 -right-3 bg-white text-black rounded-full h-6 w-6 flex items-center justify-center text-xs'>2</span>
        </a>
      </button>
    </li>
    <li>
      <a href="{{ route('user.register') }}">Register/Login</a>
    </li>
  </ul>
</nav>
</header>