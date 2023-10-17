<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AuthController extends Controller
{
    public function createSignIn() {
        return view ('auth.login');
    }

    public function signin(Request $request) {
        $credentials = $request->only(['email', 'password']);

        if (Auth::guard('webcustomers')->attempt($credentials)) {

            // Authentication passed...
            $route_redirect = Auth::guard('webcustomers')->user()->role === 'customer' ? RouteServiceProvider::HOME : RouteServiceProvider::ADMIN_HOME;
        return redirect()->intended($route_redirect);
        }
        return redirect()->route('auth.login')->with('Invalid credentials');
    }

    public function signup(Request $request){
        $request->validate([
            'firstname' => 'required|string|max:128',
            'lastname' => 'required|string|max:128',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = Customer::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
