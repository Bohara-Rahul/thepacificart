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
                <h2 class="mt-5">Pending Artist Applications</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Portfolio</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendingArtists as $artist)
                            <tr>
                                <td>{{ $artist->name }}</td>
                                <td>{{ $artist->email }}</td>
                                <td><a href="{{ $artist->portfolio_link }}" target="_blank">View Portfolio</a></td>
                                <td>{{ ucfirst($artist->application_status) }}</td>
                                <td>
                                    <form action="{{ route('artist.approve', $artist->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                    </form>
                                    <form action="{{ route('artist.reject', $artist->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </tbody>
        </table>
    </main>
@endsection
