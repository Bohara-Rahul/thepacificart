@extends('admin.layout.admin-layout')
@section('main_content')
@include('admin.layout.sidebar')
<main>
  <header class="flex justify-between items-center">
    <h2>List of Artists</h2>
    <a href="{{ route('admin_artist_create') }}" class="btn btn-primary">
      Add New Artist
    </a>
  </header>
  <table>
    <thead>
      <th>S.N.</th>
      <th>Name</th>
      <th>Location</th>
      <th>Action</th>
    </thead>
    <tbody>
      @foreach ($artists as $artist)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $artist->name }}</td>
          <td>{{ $artist->location }}</td>
          <td>
            <a href="{{ route('admin_artist_edit', $artist->id) }}" class="btn btn-secondary">Edit</a>
            <a href="{{ route('admin_artist_delete', $artist->id) }}" onclick="return confirm('Are you sure?');" class="btn btn-danger">Delete</a>
          </td>
        </tr>   
      @endforeach
    </tbody>
  </table>
</main>
@endsection
