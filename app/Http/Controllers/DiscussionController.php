<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    public function index(Request $request)
    {
        // Zoekfunctionaliteit en paginatie
        $search = $request->query('search');
        $discussions = Discussion::query();

        if ($search) {
            $discussions->where('title', 'like', "%{$search}%")
                        ->orWhere('content', 'like', "%{$search}%");
        }

        // Haal 10 discussies op met paginatie
        $discussions = $discussions->latest()->paginate(10);

        return view('discussions.index', compact('discussions', 'search'));
    }

    public function create()
    {
        // Return de pagina voor het maken van een nieuwe discussie
        return view('discussions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Maak een nieuwe discussie aan
        Discussion::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('discussions.index')->with('success', 'Discussion created successfully!');
    }

    public function show(Discussion $discussion)
    {
        // Return de pagina voor een specifieke discussie
        return view('discussions.show', compact('discussion'));
    }
}
