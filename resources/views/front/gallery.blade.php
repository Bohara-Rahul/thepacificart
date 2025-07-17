@extends('layouts.other-page-layout')
@section('title', 'Gallery - The Pacific Art Marketplace')
@section('main_content')
<!-- Filter bar -->
        <div id="filterBar" class="absolute top-[64px] left-0 w-full bg-gray-100 shadow z-40 transition-all duration-300">
            @livewire('art-filter') 
        </div>
        
    <div class="container mt-28">
        {{-- Arts List --}}
        <div class="px-4 pb-10">
            @livewire('art-list')
        </div>
    </div>
@endsection
