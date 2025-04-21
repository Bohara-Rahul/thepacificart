<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class UserDashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->latest()->take(5)->get();
        return view('user.dashboard.index', compact('user', 'orders'));
    }
}
