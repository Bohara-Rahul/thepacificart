@extends('admin.layout.admin-layout')
@section('main_content')
@include('admin.layout.sidebar')
<section>
  <h2>Create New Category</h2>
  <form action="{{ route('admin_categories_edit_submit', $category->id) }}" method="POST">
    @csrf
    <div>
      <label for="title">Title:</label>
      <input 
        type="text" 
        id="title"
        name="title" 
        value="{{ $category->title }}"  
      />
    </div>
    <button type="submit">Update</button>
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
</section>
@endsection