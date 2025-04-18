<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function track(Order $order)
    {
        // Check access
        if (Auth::check()) {
            if ($order->user_id !== Auth::id()) {
                abort(403);
            }
        } else {
            if (!request()->has('email') || $order->guest_email !== request()->email) {
                abort(403);
            }
        }

        return view('front.orders.track', compact('order'));
    }

    public function downloadPDF(Order $order)
    {
        $order->load('items.product');

        $pdf = PDF::loadView('pdf.invoice', ['order' => $order]);

        return $pdf->download("invoice-#{$order->id}.pdf");
    }
}
