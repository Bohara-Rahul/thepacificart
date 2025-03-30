@extends('layouts.other-page-layout')

@section('main_content')
    <section class="container mt-28 mb-10">
        <h2 class="section-heading">Read the blogs</h2>
        {{-- <article>List OF Tags</article> --}}
        <article class="grid grid-cols-1 md:grid-cols-3 gap-2 mt-10">
            @for ($i = 0; $i < 7; $i++)
                <aside class="p-2 hover:scale-105 transition-all duration-150">
                    <img src="{{ asset('user_pic.jpg') }}" alt="blog 1" />
                    <div class="flex justify-center items-center gap-x-4">
                        <h3>Blog Title</h3>
                        <p>By Admin</p>
                    </div>
                    <div>
                        <p class="mx-5">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae sunt minus est laborum quam rerum impedit magnam voluptate voluptas quidem.</p>
                    </div>
                    <div>
                        <button class="btn btn-primary min-w-full">
                            Read More
                        </button>
                    </div>
                </aside>
            @endfor
        </article>
    </section>
@endsection
