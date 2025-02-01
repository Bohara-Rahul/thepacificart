@extends('layouts.other-page-layout')
@section('main_content')
    <h2>Our Artists</h2>
    <ul>
        @foreach ($artists as $artist)
            <li>{{ $artist->name }}</li>
        @endforeach
    </ul>
@endsection
