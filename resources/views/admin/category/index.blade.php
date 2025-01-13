@extends('admin.layout.admin-layout')
@section('main_content')
@include('admin.layout.sidebar')
<main>
  <header class="flex justify-between">
    <h2>List of Categories</h2>
    <a href="{{ route('admin_categories_create') }}">
      Add New Category
    </a>
  </header>
  <table>
    <thead>
      <th>S.N.</th>
      <th>Name</th>
      <th>Slug</th>
      <th>Action</th>
    </thead>
    <tbody>
      @foreach ($categories as $category)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $category->title }}</td>
          <td>{{ $category->slug }}</td>
          <td>
            <a href="{{ route('admin_categories_edit', $category->id) }}">Edit</a>
          </td>
          <td>
            <a href="{{ route('admin_categories_delete', $category->id) }}" onclick="return confirm('Are you sure?')">Delete</a>
          </td>
        </tr>   
      @endforeach
    </tbody>
  </table>
</main>
@endsection
