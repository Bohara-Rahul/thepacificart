@extends('admin.layout.admin-layout')
@section('main_content')
@include('admin.layout.sidebar')
<section>
  <header class="flex justify-between mb-5">
    <h2>List of Sliders</h2>
    <a href="{{ route('admin_sliders_create') }}">Create New Slider</a>
  </header>
  <table>
    <thead>
      <tr>
        <th>S.N</th>
        <th>Path</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($sliders as $slider)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $slider->image_path }}</td>
          {{-- <td>
            <a href="{{ route('admin_sliders_delete', $slider->id) }}" onclick="return confirm('Are you sure?');">Delete</a>
          </td> --}}
        </tr>
      @endforeach
    </tbody>
  </table>
</section>
@endsection

