@extends('admin.layout.admin-layout')
@section('main_content')
@include('admin.layout.sidebar')
<section>
  <h2>Edit Artist</h2>
  <form action="{{ route('admin_artist_edit_submit', $artist->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if ($artist->photo == '')
      <p>No photo uploaded</p>
      <div>
        <label for="photo">Add Photo:</label>
        <input 
          type="file" 
          id="photo"
          name="photo" 
        />
      </div>  
    @else
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
    @endif
    
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
    <button type="submit" class="btn btn-primary">Update</button>
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