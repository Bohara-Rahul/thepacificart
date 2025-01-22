@extends('admin.layout.admin-layout')
@section('main_content')
@include('admin.layout.sidebar')
<main>
  <header class="flex justify-between items-center">
    <h2>List of Categories</h2>
    <a href="{{ route('admin_categories_create') }}" class="ml-auto">
      Add New Category
    </a>
  </header>
  <section>
  <table>
    <thead>
      <th>S.N.</th>
      <th>Name</th>
      <th>Slug</th>
      <th class="col_span_2">Action</th>
    </thead>
    <tbody>
      @foreach ($categories as $category)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $category->title }}</td>
          <td>{{ $category->slug }}</td>
          <td class="mt-2 mb-2">
            <a href="{{ route('admin_categories_edit', $category->id) }}">Edit</a>
          </td>
          <td>
            <a href="{{ route('admin_categories_delete', $category->id) }}" onclick="return confirm('Are you sure?')">Delete</a>
          </td>
        </tr>   
      @endforeach
    </tbody>
  </table>
</section>
</main>
@endsection
