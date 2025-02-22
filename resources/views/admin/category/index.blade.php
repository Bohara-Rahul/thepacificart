@extends('admin.layout.admin-layout')
@section('main_content')
@include('admin.layout.sidebar')
<main>
  <header class="flex justify-between items-center">
    <h2>List of Categories</h2>
    <a href="{{ route('admin_categories_create') }}" class="ml-auto btn btn-primary">
      Add New Category
    </a>
  </header>
  <section>
  <table>
    <thead>
      <th>S.N.</th>
      <th>Name</th>
      <th>Slug</th>
      <th class="col-span-2">Actions</th>
    </thead>
    <tbody>
      @foreach ($categories as $category)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $category->title }}</td>
          <td>{{ $category->slug }}</td>
          <td>
            <a class="btn btn-secondary" href="{{ route('admin_categories_edit', $category->id) }}">Edit</a>
            <a href="{{ route('admin_categories_delete', $category->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
          </td>
        </tr>   
      @endforeach
    </tbody>
  </table>
</section>
</main>
@endsection
