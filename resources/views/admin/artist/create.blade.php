@extends('admin.layout.admin-layout')
@section('main_content')
@include('admin.layout.sidebar')
<section>
  <h2>Add New Artist</h2>
  <form action="{{ route('admin_artist_create_submit') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
      <label for="name">Name:</label>
      <input 
        type="text" 
        id="name"
        name="name" 
        value="{{ old('name') }}" 
        placeholder="Enter artist name" 
      />
    </div>
    <div>
      <label for="Location">Location:</label>
      <input 
        type="text" 
        id="location"
        name="location" 
        value="{{ old('location') }}" 
        placeholder="Enter artist location" 
      />
    </div>
    <div>
      <label for="bio">Bio:</label>
      <textarea
        name="bio"
        id="bio"
        rows="10"
      >
        {{ old('bio') }}
      </textarea>
    </div>
    <div>
      <label for="photo">Photo:</label>
      <input 
        type="file" 
        id="photo"
        name="photo"  
      />
    </div>
    <button type="submit">Add</button>
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