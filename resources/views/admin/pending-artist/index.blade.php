@extends('admin.layout.admin-layout')
@section('main_content')
    @include('admin.layout.sidebar')
    <main>
        <header class="flex justify-between items-center">
            <h2>List of Pending Artists</h2>
        </header>
        <table>
            <thead>
                <th>S.N.</th>
                <th>Full Name</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($pending_artists as $artist)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $artist->fullname }}</td>
                        <td>
                            <a href="{{ route('admin_pending_artists_view', $artist->id) }}">
                                View Detail
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
@endsection
