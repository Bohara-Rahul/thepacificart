<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        
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

      <section class="banner">
        <img 
          src="{{ asset('logo.png') }}" 
          alt="pacificart logo"
          class="logo" 
        />
      </section>
      <header>  
        <nav>
          <ul class="flex justify-between space-x-2">
            <li>
              <a href="{{ route('front.home') }}">Home</a>
            </li>
            <li>
              <a href="{{ route('front.arts') }}">Arts</a>
            </li>
            <li>
              <a href="{{ route('front.about') }}">About</a>
            </li>
            <li>
              <a href="{{ route('front.gallery') }}">Gallery</a>
            </li>
            <li>
              <a href="{{ route('front.blog') }}">Blog</a>
            </li>
          </ul>
        </nav>
        <section class="container flex gap-5">
          <aside>
            <h2>Slogan goes here</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. <br/>Voluptas vero totam exercitationem ex nesciunt debitis earum, illo explicabo beatae eum.</p>
            <button class="btn">Learn More</button>
          </aside>
          <img src="" alt="art picture" />
        </section>
      </header>

      <main class="container">
        @yield("main_content")
      </main>

      <footer class="mt-auto">All rights reserved with &copy; {{ date('Y') }}</footer>
    </body>
</html>