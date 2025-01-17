<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $newsItems = News::orderBy('published_at', 'desc')->paginate(5);
        return view('news.index', compact('newsItems'));
    }

    public function create()
    {
        return view('news.create'); // View voor het toevoegen van nieuws
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required|string',
            'published_at' => 'required|date',
        ]);

        $imagePath = $request->file('image')->store('news_images', 'public');

        News::create([
            'title' => $validated['title'],
            'image' => $imagePath,
            'content' => $validated['content'],
            'published_at' => $validated['published_at'],
        ]);

        return redirect()->route('news.index')->with('success', 'News item created successfully!');
    }

    public function show(News $news)
    {
        // Laad het specifieke nieuwsitem en stuur het naar de view
        return view('news.show', compact('news'));
    }

    public function edit(News $news)
    {
        return view('news.edit', compact('news')); // View voor het bewerken van nieuws
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required|string',
            'published_at' => 'required|date',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news_images', 'public');
            if ($news->image) {
                \Storage::disk('public')->delete($news->image);
            }
            $news->update(['image' => $imagePath]);
        }

        $news->update($validated);

        return redirect()->route('news.index')->with('success', 'News item updated successfully!');
    }

    public function destroy(News $news)
    {
        if ($news->image) {
            \Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()->route('news.index')->with('success', 'News item deleted successfully!');
    }
}
