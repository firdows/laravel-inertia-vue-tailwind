<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function create()
    {
        return inertia("Auth/Login");
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials, true)) {
            throw ValidationException::withMessages([
                "email" => "Authentication failed"
            ]);
        }
        
        $request->session()->regenerate();
        return redirect()->intended('/listing');


        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.'
        // ])->onlyInput('email');
    }

    public function detroy()
    {
        //
    }
}
