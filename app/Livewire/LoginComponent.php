<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Cart as Cart;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class LoginComponent extends Component
{
    public $email, $password;
    public $showPassword = false;
    protected $cartService;

    public function boot(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'string|email',
            'password' => 'string'
        ]);

        if (Auth::attempt([
            'email' => $this->email,
            'password' => $this->password
        ])) 
        {
            if (Session::has('cart')) {
                $sessionCart = Session::get('cart', []);
                foreach ($sessionCart as $productId) {
                    $this->cartService->addToCart($productId);
                }       
                Session::forget('cart');
            }

            // Check if there's a redirect_to parameter and store it
            $redirectTo = $request->input('redirect_to') 
                ?? route('user.dashboard');

            return redirect($redirectTo)->with('success', 'You have successfully logged in');
        }
        else {
            throw ValidationException::withMessages([
                'credentials' => 'Invalid credentials'
            ]);
        }
    }

    public function toggleShowPassword()
    {
        $this->showPassword = !$this->showPassword;
    }

    public function render()
    {
        return view('livewire.login-component');
    }
}
