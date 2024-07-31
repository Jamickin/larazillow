<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        $currentUser = Auth::user();
        return inertia('Profile/Show', [
            'user' => $user,
            'listings' => $user->listings,
            'currentUser' => $currentUser ? $currentUser->only('id', 'is_admin') : null,
        ]);
    }
}
