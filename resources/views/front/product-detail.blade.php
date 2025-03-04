@extends('layouts.other-page-layout')
@section('main_content')
    <section class="container">
        <div class="grid grid-cols-2 mt-10">
            <img id="main-photo-container" src="{{ asset('uploads/' . $product->primary_image) }}" alt="{{ $product->title }}"
                class="w-[520px] rounded-md" />
            <article class="flex flex-col">
                <h2>{{ $product->title }}</h2>
                <p>{!! $product->description !!}</p>
                <span>{{ $product->price }}</span>
            </article>
        </div>
        <div class="flex space-x-2 mt-5 overflow-x-auto">
            @foreach ($product->photos as $photo)
                <img id="photos" src="{{ asset('uploads/' . $photo->name) }}" alt="{{ $photo->name }}"
                    class="mb-20 w-[50px] h-[50px]" />
            @endforeach
        </div>

    </section>
@endsection
