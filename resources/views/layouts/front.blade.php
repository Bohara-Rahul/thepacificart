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

      <footer class="footer p-5">
        <div class="container grid grid-cols-3">
          <ul class="flex flex-col gap-2">
          <p class="text-xl">Contact Us</p>
            <li><i class="fa-solid fa-phone mr-2"></i> +61 450 213 015</li>
            <li><i class="fa-solid fa-envelope mr-2"></i> info@thepacificart.com.au</li>
          </ul>
              
              <ul class="flex flex-col space-x-2">
              <p class="text-xl">Social Media</p>
              <div class="flex gap-5">
                <a href="https://www.facebook.com/profile.php?id=61571620204348" target="_blank">
                <li>
                  <i class="fa-brands fa-facebook text-lg"></i>
                </li>
                </a>
              
              <li href="#">
                <i class="fa-brands fa-instagram text-lg"></i>
              </li>
              </div>
              
              </ul>
              
            <ul>
              <li>Terms and Conditions</li>
              <li>Return Policy</li>
            </ul> 
          </div>

       <p class="text-center">All rights reserved with &copy; {{ date('Y') }}</p>
        
      </footer>

      @vite('resources/js/app.js')
    </body>
</html>