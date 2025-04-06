@component('mail::message')
    # Thank you for your order!

    **Order ID:** {{ $order->id }}
    **Name:** {{ $order->shipping_name }}
    **Total:** ${{ number_format($order->total, 2) }}

    ## Items:
    @foreach ($order->items as $item)
        - {{ $order->product->title }} x {{ $item->quantity }} — ${{ number_format($item->price, 2) }}
    @endforeach

    @component('mail::button', ['url' => route('order.track', $order->id)])
        Track Your Order
    @endcomponent

    Thanks,<br/>
    {{ config('app.name') }}
@endcomponent
