<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    public function index()
    {
        // Haal de 5 meest recente discussies op
        $discussions = Discussion::latest()->take(5)->get();

        return view('dashboard', compact('discussions'));
    }

    public function create()
    {
        return view('discussions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Controleer of de gebruiker is ingelogd
        if (!auth()->check()) {
            abort(403, 'Unauthorized action.');
        }

        Discussion::create([
            'title' => $request->title,
            'content' => $request->content,
            'author_id' => auth()->id(), // Zorg ervoor dat dit werkt
        ]);

        return redirect()->route('discussions.index')->with('success', 'Discussion created successfully!');
    }

    public function show(Discussion $discussion)
    {
        return view('discussions.show', compact('discussion'));
    }
}
