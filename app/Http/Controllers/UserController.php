<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register()
    {
        return view("front.register");
    }

    public function register_submit(Request $request) 
    {
        $request->validate([
            'name' => 'string|required',
            'email' => 'string|required|email',
            'password' => 'string|required',
            'retype_password' => 'string|required|same:password'
        ]);

        $user = new User();

        if ($request->photo) {
            $request->validate([
                'photo' => 'string|mimes:jpg,jpeg,png,svg,webp|max:2048',
            ]);

            $filename = 'user_'.time().'.'.$request->photo->extension;
            $request->photo->move(public_path('uploads/', $filename));
            $user->photo = $filename;
        }
        else {
            $user->photo = public_path('uploads/'.'fallback-avatar.jpg');
        }
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $token = hash('sha256',time());
        $user->token = $token;
        $user->isAdmin = 0;
        $user->save();

        return redirect()->route('user.login');
    }

    public function login()
    {
        return view('front.login');
    }

    public function login_submit(Request $request)
    {
        $validated = $request->validate([
            'email' => 'string|required|email', // 'email' => ['string','required','email']
            'password' => 'string|required'
        ]);

        if (auth()->attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
            return redirect()->route('user.dashboard');
        }
        else {
            return redirect()->route('user.login')->withInput();
        }
    }

    public function dashboard()
    {
        return view('user.dashboard');
    }
}
