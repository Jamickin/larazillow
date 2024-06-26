<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {

        // dd(Auth::User());
        // dd(auth::check());


        return inertia('Index/Index', [
            'message' => 'Hello'
        ]);
    }

    public function show()
    {
        return inertia('Index/Show', [
            'message' => 'This is a different message'
        ]);
    }
}