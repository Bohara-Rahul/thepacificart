<?php

namespace App\Http\Controllers;

use App\Mail\EmailVerification;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function register()
    {
        return view("front.register");
    }

    public function register_submit(Request $request) 
    {
        $validated = $request->validate([
            'name' => 'string|required',
            'email' => 'string|required|email',
            'password' => 'string|required|confirmed',
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
            $user->photo = 'user-pic.jpg';
        }
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $token = hash('sha256',time());
        $user->token = $token;
        $user->isAdmin = 0;
        $user->save();

        $verification_link = url('register-verify/'.$token.'/'.$request->email);
        $subject = 'Registration Verification';
        $message = 'To complete registration, please click on the link below:<br>';
        $message .= '<a href="'.$verification_link.'">Click Here</a>';

        Mail::to($request->email)->send(new EmailVerification($subject, $message));

        return redirect()->back()->with('success', 'Your registration is completed. Please check your email for verification. If you do not find email in your inbox, please check your spam folder.');
    }

    public function register_verify($token, $email)
    {
        $user = User::where('email', $email)->where('token', $token)->first();
        if (!$user) {
            return redirect()->route('user.login');
        }

        $user->token = '';
        $user->update();

        return redirect()->route('user.login')->with('success', 'Your email is verified. You can login now');
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

        if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
            $request->session()->regenerate();
            return redirect()
                ->route('user.dashboard')
                ->with('success', 'Logged in successfully!!!');
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
        return redirect()->route('user.login')->with('success', 'Loggedd out successfully');
    }

    public function dashboard()
    {
        $wishlists = Wishlist::with('product')->where('user_id', Auth::user()->id)->get();
        return view('user.dashboard', compact('wishlists'));
    }
}
