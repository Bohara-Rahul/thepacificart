@extends('admin.layout.admin-layout')
@section('main_content')
@include('admin.layout.sidebar')
  <form 
    action="{{ route('admin_sliders_create_submit') }}" 
    method="POST" 
    enctype="multipart/form-data"
  >
    @csrf
    <div>
      <label for="photo">Choose photos</label>
      <input 
        type="file" 
        id="file" 
        name="photo" 
      /> 
    </div>
    <button type="submit">Create</button>
  </form>

  <!-- validation errors -->
  @if ($errors->any())
    <ul class="max-w-2xl px-4 py-2 bg-red-100">
      @foreach ($errors->all() as $error)
        <li class="my-2 text-red-500">
          {{ $error }}
        </li>
      @endforeach
    </ul>
  @endif
@endsection