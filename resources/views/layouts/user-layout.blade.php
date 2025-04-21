<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <title>@yield('title', 'The Pacific Art - Art Marketplace')</title>

    @livewireStyles
    @vite('resources/css/app.css')
</head>

<body>
    <livewire:user-page-nav />

    <main class="container">
        @yield('main_content')
    </main>

    @component('front.components.footer')
        
    @endcomponent

    <script>
        @if(session('success'))
            toastr.success("{{ session('success') }}");
        @endif
    
        @if(session('error'))
            toastr.error("{{ session('error') }}");
        @endif
    </script>

    @livewireScripts
    @vite('resources/js/app.js')
</body>

</html>
