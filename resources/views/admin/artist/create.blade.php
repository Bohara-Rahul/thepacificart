@extends('admin.layout.admin-layout')
@section('main_content')
@include('admin.layout.sidebar')
<section>
  <h2>Add New Artist</h2>
  <form action="{{ route('admin_artist_create_submit') }}" method="POST">
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
        value="{{ old('photo') }}"  
      />
    </div>
    <button type="submit">Add</button>
  </form>
</section>
@endsection