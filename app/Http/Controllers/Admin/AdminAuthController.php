<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

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

        if (Auth::attempt($validated))
        {
            $request->session()->regenerate();
            return redirect()->route("admin_dashboard");
        }
        
        throw ValidationException::withMessages([
            'credentials' => 'Invalid credentials'
        ]);

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin_login')->with('success', 'Logged out successfully!!!');
    }
}
