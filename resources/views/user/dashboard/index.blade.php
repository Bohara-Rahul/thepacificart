@extends('layouts.user-layout')

@section('main_content')
<div class="container">
    <h2 class="mb-4">Welcome, {{ $user->name }}</h2>

    <div class="row">
        <!-- User Info -->
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">Your Info</div>
                <div class="card-body">
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Phone:</strong> {{ $user->phone ?? 'Not set' }}</p>
                    {{-- <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-primary">Edit Profile</a> --}}
                </div>
            </div>
        </div>

        <!-- Recent Orders -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Recent Orders</div>
                <div class="card-body">
                    @if($orders->count())
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Order #</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->order_number }}</td>
                                        <td>{{ $order->created_at->format('d M Y') }}</td>
                                        <td>{{ ucfirst($order->status) }}</td>
                                        <td>${{ number_format($order->total, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>You have no orders yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
