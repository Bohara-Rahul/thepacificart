@extends('layouts.front')
@section('main_content')
  <section class="flex gap-4 items-center mt-44">
    @include('front.components.sidebar')
    <article>
    <h2>Arts</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4">
      @foreach ($arts as $art)
        <x-card>
          <h2>{{ $art->title }}</h2>
          <p></p>
        </x-card>   
      @endforeach
    </div>
  </article>
  </section>  
@endsection