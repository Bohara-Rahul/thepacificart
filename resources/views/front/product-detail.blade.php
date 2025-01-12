@extends('layouts.front')
@section('main_content')
  <h2>{{ $product->title }}</h2>
  <p>{!! $product->description !!}</p>
  <span>{{ $product->price }}</span>
@endsection