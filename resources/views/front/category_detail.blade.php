@extends('layouts.other-page-layout')
@section('main_content')
  <section>
    <h3 class="section-heading">
      {{ $category->title }}
    </h3>
    {{-- <img src="{{ asset('uploads/' . ) }}"/> --}}
    @foreach ($products as $product)
      <article>
          <h4>{{ $product->title }}</h4>
          <p>${{ $product->price }}</p>
      </article> 
    @endforeach
  </section>
@endsection
