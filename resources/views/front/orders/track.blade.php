<x-app-layout>
    <div class="max-w-2xl mx-auto space-y-4">
        <h1 class="text-2xl font-bold">Order Tracking</h1>
        <p><strong>Order ID:</strong> {{ $order->id }}</p>
        <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
        <p><strong>Total:</strong> ${{ number_format($order->total, 2) }}</p>

        <h2 class="text-xl mt-4">Items</h2>
        <ul class="list-disc pl-6">
            @foreach ($order->items as $item)
                <li>{{ $item->product->title }} x {{ $item->quantity }}</li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
