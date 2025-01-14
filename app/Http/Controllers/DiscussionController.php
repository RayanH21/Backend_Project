<?php

namespace App\Http\Controllers;

use App\Models\Discussion;

class DiscussionController extends Controller
{
    public function index()
    {
        // Haal de 5 meest recente discussies op
        $discussions = Discussion::latest()->take(5)->get();

        // Stuur deze data naar de dashboard view
        return view('dashboard', compact('discussions'));
    }
}
