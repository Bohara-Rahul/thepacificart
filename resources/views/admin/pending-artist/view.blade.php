@extends('admin.layout.admin-layout')
@section('main_content')
    @include('admin.layout.sidebar')
    <main>
        {{ $pending_artist->fullname }}
    </main>
@endsection
