<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>

    @trixassets
    @livewireStyles
    @vite('resources/css/app.css')
   
</head>

<body class="container">
    <nav class="flex justify-between items-center py-5">
        <h2>Hello {{ auth()->user()->name }}</h2>
        <ul class="flex justify-between items-center space-x-5">
            <li>
                <form action="{{ route('user.logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
            <li>
                <a href="{{ route('front.home') }}" class="btn btn-secondary">Front End</a>
            </li>
        </ul>

    </nav>

    @if (session('success'))
        <div id="flash" class="p-4 text-center bg-green-50 text-green-500 font-bold">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('failure'))
        <div class="p-4 text-center bg-red-100 text-red-500 font-bold">
            {{ session('failure') }}
        </div>
    @endif

    <main class="flex space-x-5">
        @yield('main_content')
    </main>

    @livewireScripts
    @vite('resources/js/app.js')
</body>

</html>