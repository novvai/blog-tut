<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    /**
     *
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     *
     */
    public function register()
    {
        return view('auth.register');
    }

    /**
     * 
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('posts');
        }

        return back()->withErrors([
            'email' => 'E-mail, password or both are incorrect'
        ])->onlyInput('email');
    }

    public function processRegister(Request $request)
    {
        // TODO: register user
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed']
        ]);

        $user = User::create($data);
        auth()->login($user);

        return redirect()->intended('posts');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
