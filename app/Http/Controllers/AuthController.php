<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function create()
    {
        return inertia("Auth/Login");
    }

    public function store(Request $request)
    {
        $field = $request->validate([
            'email'=>['required','email'],
            'password'=>['required']
        ]);
    }

    public function detroy()
    {
        //
    }
}
