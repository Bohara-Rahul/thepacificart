<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

      @include('front.components.nav')

      <main>
        @yield("main_content")
      </main>

      @include('front.components.footer')


      @vite('resources/js/app.js')
    </body>
</html>