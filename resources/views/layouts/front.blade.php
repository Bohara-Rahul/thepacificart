<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>
      <header>
        <nav>
          <h1>The Pacific Art</h1>
          <ul>
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
      </header>

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

      <main class="container">
        @yield("main_content")
      </main>

      <footer>All rights reserved with &copy; {{ date('Y') }}</footer>
    </body>
</html>