@extends('admin.layout.admin-layout')
@section('main_content')
@include('admin.layout.sidebar')
    <main>
        <header class="flex justify-between items-center">
            <h2>List of Blogs</h2>
            <a href="{{ route('admin_blogs_create') }}" class="ml-auto btn btn-primary">
                Add New Blog
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
                    @foreach ($blogs as $blog)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->slug }}</td>
                            <td>
                                <a class="btn btn-secondary" href="{{ route('admin_blogs_edit', $blog->id) }}">Edit</a>
                                <a href="{{ route('admin_blogs_delete', $blog->id) }}"
                                    onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
@endsection
