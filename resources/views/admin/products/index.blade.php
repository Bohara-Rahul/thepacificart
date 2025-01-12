@extends('admin.layout.admin-layout')
@section('main_content')
@include('admin.layout.sidebar')
<section>
  <header class="flex justify-between mb-5">
    <h2>List of Arts</h2>
    <a href="#">Create New Art</a>
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
          <td>Edit</td>
          <td>Delete</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</section>
@endsection

