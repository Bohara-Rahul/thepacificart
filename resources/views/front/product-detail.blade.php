@extends('layouts.front')
@section('main_content')
  <h2>{{ $product->title }}</h2>
  <p>{!! $product->description !!}</p>
  <span>{{ $product->price }}</span>
  @foreach ($product->photos as $photo)
    <article style="width: 500px; height: 200px;">
      <img 
        src="{{ asset('uploads/'.$photo->name) }}" 
        alt="{{ $photo->name }}" 
        style="object-fit: cover;"
      />
    </article> 
  @endforeach
@endsection