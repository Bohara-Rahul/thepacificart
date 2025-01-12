@extends('admin.layout.admin-layout')
@section('main_content')
@include('admin.layout.sidebar')
<section>
  <h2>Create New Category</h2>
  <form action="{{ route('admin_categories_create_submit') }}" method="POST">
    @csrf
    <div>
      <label for="title">Title:</label>
      <input 
        type="text" 
        id="title"
        name="title" 
        value="{{ old('title') }}" 
        placeholder="Enter category title" 
      />
    </div>
    <button type="submit">Create</button>
  </form>
</section>
@endsection