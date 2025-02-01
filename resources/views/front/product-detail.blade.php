@extends('layouts.front')
@section('main_content')
  <h2>{{ $product->title }}</h2>
  <p>{!! $product->description !!}</p>
  <span>{{ $product->price }}</span>
  @foreach ($product->photos as $photo)
    <div class="container">

        <img 
          src="{{ asset('uploads/'.$photo->name) }}" 
          alt="{{ $photo->name }}" 
          class="mb-20 w-[520px]"
        />

    </div>
   

  @endforeach
@endsection