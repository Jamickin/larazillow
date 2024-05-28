<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function create()
    {
        return inertia('Auth/Login');
    }

    public function store(Request $request)
    {
        
        Auth::attempt($request->validate([
            'email' => 'required|string|email',
            'password'=> 'required|string'
        ]));
    }

    public function destroy ()
    {}
}