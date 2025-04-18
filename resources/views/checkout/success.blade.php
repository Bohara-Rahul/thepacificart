@extends('layouts.user-layout')

@section('title', 'Order Confirmation')

@section('main_content')
    <div class="min-h-[70vh] bg-gray-50 mt-14 py-10 px-4 flex justify-center">
        <div class="bg-white max-w-3xl w-full shadow-xl rounded-2xl p-8">
            <div class="text-center mb-6">
                <div class="text-green-500 text-5xl mb-2">✅</div>
                <h1 class="text-3xl font-bold text-gray-800">Thank you for your order!</h1>
                <p class="text-gray-600 mt-2">Your order has been placed successfully.</p>
            </div>

            {{-- Order Summary --}}
            <div class="border-t pt-6">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Order Summary</h2>

                <div class="mb-4">
                    <p><strong>Order ID:</strong> #{{ $order->id }}</p>
                    <p><strong>Order Date:</strong> {{ $order->created_at->format('M d, Y') }}</p>
                    <p><strong>Total:</strong> ${{ number_format($order->total, 2) }}</p>
                    <p><strong>Status:</strong>
                        <span class="inline-block px-2 py-1 text-sm font-medium bg-green-100 text-green-800 rounded">
                            {{ ucfirst($order->status) }}
                        </span>
                    </p>
                    <p><strong>Estimated Delivery:</strong>
                        {{ now()->addDays(5)->format('M d, Y') }} &mdash; {{ now()->addDays(8)->format('M d, Y') }}
                    </p>
                </div>

                {{-- Items --}}
                <div class="bg-gray-100 p-4 rounded-md">
                    <h3 class="font-semibold text-gray-700 mb-3">Items:</h3>
                    <ul class="divide-y divide-gray-300">
                        @foreach ($order->items as $item)
                            <li class="py-2 flex justify-between">
                                <div>
                                    <img src="{{ asset('uploads/' . $item->product->primary_image) }}"
                                        alt="{{ $item->product->title }}" class="w-20 h-20">
                                    <p class="text-gray-800">{{ $item->product->title }}</p>
                                    <p class="text-sm text-gray-500">x{{ $item->quantity }}</p>
                                </div>
                                <div class="text-gray-800 font-medium">
                                    ${{ number_format($item->price * $item->quantity, 2) }}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Download PDF --}}
                <div class="mt-6 text-center">
                    <a href="{{ route('invoice.download', $order) }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition">
                        📄 Download Invoice (PDF)
                    </a>
                </div>
            </div>

            {{-- Footer note --}}
            <div class="mt-8 text-sm text-gray-500 text-center">
                Need help? <a href="mailto:info@thepacificart.com" class="text-blue-500 hover:underline">Contact us</a>
            </div>
        </div>
    </div>
@endsection
