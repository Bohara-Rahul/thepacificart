@extends('layouts.other-page-layout')
@section('title', 'Artists - The Pacific Art Marketplace')
@section('main_content')
    <section class="container mt-28">
        <h2 class="section-heading text-center">Meet Our Artists</h2>
        <article class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-5 mb-20">
            @foreach ($artists as $artist)
                <aside
                    class="flex flex-col justify-center items-center bg-[#3d6571] hover:bg-[#13292a] transition-all p-2 text-white gap-x-2 rounded-sm">
                    <div class="">
                        <img src="{{ asset('user_pic.jpg') }}" alt="{{ $artist->name }}" class="w-28 h-28 rounded-full" />
                    </div>
                    <div class="text-center py-2">
                        <p class="text-center text-2xl">{{ $artist->name }}</p>
                        <p>
                            {{ strlen($artist->bio) > 50 ? substr($artist->bio, 0, 50) . '...Read More' : $artist->bio }}
                        </p>
                        <a href="" class="block border border-gray-200 mt-6 p-2 max-w-content">
                            More Info about Artist
                        </a>
                    </div>
                </aside>
            @endforeach
        </article>
    </section>
@endsection
