<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>The Pacific Art - Art marketplace</title>
</head>

<body>

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
        @yield('main_content')
    </main>

    <footer>All rights reserved with &copy; {{ date('Y') }}</footer>
</body>

</html>
