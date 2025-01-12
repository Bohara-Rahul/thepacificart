<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <nav class="flex flex-row">
    <h2>Hello {{ auth()->user()->name }}</h2>
    <a href="{{ route('front.home') }}">Front End</a>
  </nav>

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

  <main>
    @yield("main_content")
  </main>
</body>
</html>