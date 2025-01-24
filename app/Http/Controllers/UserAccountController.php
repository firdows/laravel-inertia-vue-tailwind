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
        // $fields = $request->validate([
        //     'name' => ['required', 'max:150'],
        //     'email' => ['required', 'max:150', 'email', 'unique:users'],
        //     'password' => ['required', 'confirmed'],
        // ]);
        // $user = User::create($fields);

        $user = User::make($request->validate([
            'name' => ['required', 'max:150'],
            'email' => ['required', 'max:150', 'email', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]));
        $user->password = Hash::make($user->password);
        $user->save();

        Auth::login($user);

        return redirect()->route('home')->with('success', 'Account created!');
    }
}
