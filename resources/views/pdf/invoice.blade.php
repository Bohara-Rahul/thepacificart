<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Invoice #{{ $order->id }}</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #3d6571;
            color: #fff;
            border: none;
        }

        h2 {
            color: #2c3e50;
        }

        table {
            border: none;
        }

        td {
            border-bottom: 1px solid #eee;
        }

        tfoot td {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div style="text-align: center;">
        <div style="background-color: #13292a;">
            <img src="{{ public_path('logo_3.png') }}" alt="Company Logo" style="height: 80px;">
        </div>
        <p>
            <strong>The Pacific Art</strong><br>
            Brisbane, Queensland, Australia<br>
            admin@thepacificart.com | +61 (494) 381-041
        </p>
    </div>
    <h2>Invoice #{{ $order->id }}</h2>
    <p><strong>Order Date:</strong> {{ $order->created_at->format('F j, Y') }}</p>
    <p><strong>Name:</strong> {{ $order->shipping_name }}</p>
    <p><strong>Email:</strong> {{ $order->guest_email ?? ($order->user->email ?? 'N/A') }}</p>
    <p><strong>Address:</strong> {{ $order->shipping_address }}, {{ $order->shipping_city }},
        {{ $order->shipping_zip }}, {{ $order->shipping_country }}</p>
    <p><strong>Total:</strong> ${{ number_format($order->total, 2) }}</p>

    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Qty</th>
                <th>Price (Each)</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->items as $item)
                <tr>
                    <td>{{ $item->product->title ?? 'Product Removed' }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ number_format($item->prodduct->price, 2) }}</td>
                    <td>${{ number_format($item->product->price * $item->quantity, 2) }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3" style="text-align: right;"><strong>Total:</strong></td>
                <td><strong>${{ number_format($order->total, 2) }}</strong></td>
            </tr>
        </tbody>
    </table>

    <footer style="margin-top: 30px; text-align: center; font-size: 12px;">
        Thank you for shopping with us! For any questions, contact admin@thepacificart.com
    </footer>
</body>

</html>
