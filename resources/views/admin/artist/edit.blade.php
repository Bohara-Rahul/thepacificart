@extends('admin.layout.admin-layout')
@section('main_content')
@include('admin.layout.sidebar')
<section>
  <h2>Edit Artist</h2>
  <form action="{{ route('admin_artist_edit_submit', $artist->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
      <label>Current Photo:</label>
      <img src="{{ asset('uploads/'.$artist->photo) }}" alt="{{ $artist->name }}" />
    </div>
    <div>
      <label for="photo">Change Photo:</label>
      <input 
        type="file" 
        id="photo"
        name="photo" 
        value="{{ $artist->photo }}" 
      />
    </div>
    <div>
      <label for="name">Name:</label>
      <input 
        type="text" 
        id="name"
        name="name" 
        value="{{ $artist->name }}" 
      />
    </div>
    <div>
      <label for="Location">Location:</label>
      <input 
        type="text" 
        id="location"
        name="location" 
        value="{{ $artist->location }}" 
      />
    </div>
    <div>
      <label for="bio">Bio:</label>
      <textarea
        name="bio"
        id="bio"
        rows="10"
      >
        {{ $artist->bio }}
      </textarea>
    </div>
    <button type="submit">Update</button>
  </form>
</section>
@endsection