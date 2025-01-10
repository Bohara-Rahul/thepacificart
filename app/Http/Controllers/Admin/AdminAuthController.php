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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $check = $request->all();

        $data = [
            "email" => $check["email"],
            "password" => $check["password"],
        ];

        if (Auth::guard("admin")->attempt($data)) 
        {
            return redirect()->route("admin_dashboard");
        }
        else 
        {
            return redirect()->route("admin_login");
        }

    }
}
