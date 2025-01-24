<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAccountController extends Controller
{
    public function create(){
        return inertia("UserAccount/Create");
    }

    public function store(Request $request){        

        $user = User::create($request->validate([
            'name' => ['required', 'max:150'],
            'email' => ['required', 'max:150', 'email', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]));
        

        Auth::login($user);

        return redirect()->route('home')->with('success', 'Account created!');
    }
}
