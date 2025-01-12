@extends('admin.layout.admin-layout')
@section('main_content')
@include('admin.layout.sidebar')
  <h2>List of Products</h2>
  <table>
    <thead>
      <tr>
        <th>SN</th>
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
          <td>Edit</td>
          <td>Delete</td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <a href="{{ route('admin_products_create') }}">Add New Art</a>
@endsection

