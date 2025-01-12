@extends('admin.layout.admin-layout')
@section('main_content')
@include('admin.layout.sidebar')
<h2>Create New Category</h2>
<form action="#" method="POST">
  @csrf
  <div>
    <label for="name">Name:</label>
    <input type="text" id="name" value="{{ old('name') }}" />
  </div>
  <button type="submit">Create</button>
</form>
@endsection