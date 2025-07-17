<div>
    <h1 class="text-2xl font-bold mb-6">Welcome back, {{ auth()->user()->name }}!</h1>

    <div class="bg-white shadow rounded-lg p-4">
        <h2 class="text-xl font-semibold mb-4">Recent Orders</h2>

        @if ($orders->count())
            <table class="w-full table-auto text-sm">
                <thead class="text-left border-b">
                    <tr>
                        <th>Order #</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="border-b">
                            <td>{{ $order->order_number }}</td>
                            <td>{{ ucfirst($order->status) }}</td>
                            <td>${{ number_format($order->total, 2) }}</td>
                            <td>{{ $order->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('orders.show', $order) }}"
                                    class="text-blue-500 hover:underline">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No orders found.</p>
        @endif
    </div>
</div>
