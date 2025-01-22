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
@endsection