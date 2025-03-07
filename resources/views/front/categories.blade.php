@extends('layouts.other-page-layout')
@section('main_content')
    <main class="container mt-28">
        <ul>
            @foreach ($categories as $category)
                <li>{{ $category->title }}</li>
            @endforeach
        </ul>
    </main>
@endsection
