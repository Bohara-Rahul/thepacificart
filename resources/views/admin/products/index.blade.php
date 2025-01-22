@extends('admin.layout.admin-layout')
@section('main_content')
@include('admin.layout.sidebar')
<section>
  <header class="flex justify-between items-center">
    <h2>List of Arts</h2>
    <a href="{{ route('admin_products_create') }}">Create New Art</a>
  </header>
  <table>
    <thead>
      <tr>
        <th>S.N</th>
        <th>Title</th>
        <th>Slug</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $product)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $product->title }}</td>
          <td>{{ $product->slug }}</td>
          <td>
            <a href="{{ route('admin_products_edit', $product->id) }}">Edit</a>
            <a href="{{ route('admin_products_delete', $product->id) }}" onclick="return confirm('Are you sure?');">Delete</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</section>
@endsection

