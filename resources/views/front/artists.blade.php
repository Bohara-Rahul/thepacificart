@extends('layouts.other-page-layout')
@section('main_content')
<section class="container mt-40">
    <h2>Our Artists</h2>
    <ul>
        @foreach ($artists as $artist)
            <li>{{ $artist->name }}</li>
        @endforeach
    </ul>
</section>
@endsection
