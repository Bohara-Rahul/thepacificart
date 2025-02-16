@extends('admin.layout.admin-layout')
@section('main_content')
    @include('admin.layout.sidebar')
    <main>
        <h2 class="mt-5">Pending Artist Applications</h2>
        <table>
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Portfolio</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pending_artists as $artist)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $artist->fullname }}</td>
                        <td>{{ $artist->email }}</td>
                        <td><a href="{{ $artist->portfolio_link }}" target="_blank">View Portfolio</a></td>
                        <td>{{ ucfirst($artist->application_status) }}</td>
                        <td>
                            <div class="flex space-x-2">
                                <a href="{{ route('admin_pending_artists_view', $artist->id) }}"
                                    class="btn btn-secondary">View</a>
                                <form action="{{ route('admin_pending_artists_approve', $artist->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Approve</button>
                                </form>
                                <form action="{{ route('admin_pending_artists_reject', $artist->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Reject</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
@endsection
