<?php

namespace App\Livewire;

use Livewire\Component;
use App\Mail\EmailVerification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class RegisterComponent extends Component
{
    public $name, $email, $password, $confirmPassword;
    public $showPassword = false;
    public $showConfirmPassword = false;

    public function toggleShowPassword()
    {
        $this->showPassword = !$this->showPassword;
    }

    public function toggleShowConfirmPassword()
    {
        $this->showConfirmPassword = !$this->showConfirmPassword;
    }

    public function register(Request $request) 
    {
        $request->validate([
            'name' => 'string',
            'email' => 'string|email|unique:users,email',
            'password' => 'string|confirmed',
        ]);

        $existingUser = User::where('email', $this->email)->first();

        if ($existingUser) {
            throw ValidationException::withMessages([
                'credentials' => 'Email already taken'
            ]);
        }

        if ($this->password !== $this->confirmPassword) {
            throw ValidationException::withMessages([
                'credentials' => 'Passwords do not match'
            ]);
        }

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
        
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $token = hash('sha256',time());
        $user->token = $token;
        $user->isAdmin = 0;  
        $user->save();

        $verification_link = url('register-verify/'.$token.'/'.$this->email);
        $subject = 'Registration Verification';
        $message = 'To complete registration, please click on the link below:<br>';
        $message .= '<a href="'.$verification_link.'">Click Here</a>';

        Mail::to($this->email)->send(new EmailVerification($subject, $message));
        $this->reset();
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

    
    public function render()
    {
        return view('livewire.register-component');
    }
}
