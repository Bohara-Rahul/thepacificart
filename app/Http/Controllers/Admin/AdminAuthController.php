<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function login_submit(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);    

        if (auth()->attempt(['email' => $validated['email'], 'password' => $validated['password']])) 
        {
            return redirect()->route("admin_dashboard");
        }
        else 
        {
            return redirect()->route("admin_login");
        }

    }
}
