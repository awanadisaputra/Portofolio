<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('owner.auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->intended('home');
        }

        return back()->withErrors([
            'username' => 'Username atau Password salah'
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
