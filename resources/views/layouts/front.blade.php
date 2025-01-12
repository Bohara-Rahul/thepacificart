<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        
        @vite('resources/css/app.css')
    </head>
    <body class="sm:max-w-3xl md:max-w-4xl lg:max-w-6xl mx-auto px-5 max-h-screen">

      @if (session()->has('success'))
      <div class="container container--narrow">
        <div class="alert alert-success text-center">
          {{ session('success') }}
        </div>
      </div>    
    @endif

    @if (session()->has('failure'))
      <div class="container container--narrow">
        <div class="alert alert-danger text-center">
          {{ session('failure') }}
        </div>
      </div>    
    @endif

      <header class="max-h-52">  
        <nav class="flex items-center justify-between py-2">
          <h1>The Pacific Art</h1>
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
        <section class="flex space-x-2">
          <aside>
            <h2>Slogan goes here</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. <br/>Voluptas vero totam exercitationem ex nesciunt debitis earum, illo explicabo beatae eum.</p>
            <button class="bg-red-400 hover:bg-red-500 text-zinc-50 p-2 rounded-sm ">Learn More</button>
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