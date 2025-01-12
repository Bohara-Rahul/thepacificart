@extends('admin.layout.admin-layout')
@section('main_content')
@include('admin.layout.sidebar')
<main>
  <h2>List of Categories</h2>
  <table>
    <thead>
      <th>S.N</th>
      <th>Name</th>
      <th>Slug</th>
      <th>Action/th>
    </thead>
    <tbody>
      @foreach ($categories as $category)
        <tr>
          <td>{{ $loop->iteration }}</td>
        </tr>   
        <tr>
          <td>{{ $category->name }}</td>
        </tr>   
        <tr>
          <td>{{ $category->slug }}</td>
        </tr>   
        <tr>
          <td>
            <a href="#">Edit</a>
          </td>
          <td>
            <a href="#">Delete</a>
          </td>
        </tr>   
      @endforeach
    </tbody>
  </table>
</main>
@endsection
