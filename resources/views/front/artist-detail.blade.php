@extends('layouts.other-page-layout')
@section('title', "What's New - The Pacific Art Marketplace")
@section('main_content')
    <section class="container p-5 mt-20 flex flex-wrap gap-5">
        <article class="w-80">
            <img class="rounded-sm" src="{{ asset('user_pic.jpg') }}" alt="{{ $artist->name }}" />
        </article>
        <article>
          <h2 class="text-2xl">{{ $artist->name }}</h2>
          <p class="max-w-lg">{{ $artist->bio }}</p>
        </article>
        
    </section>
@endsection
