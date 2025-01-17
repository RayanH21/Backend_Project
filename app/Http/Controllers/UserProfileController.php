<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id); // Haalt de gebruiker op via het ID
        return view('profile.show', compact('user'));
    }
}

