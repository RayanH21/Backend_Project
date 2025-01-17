<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    // Toon FAQ's
    public function index()
    {
        $faqs = FaqCategory::with('faqs')->get();  // Haal alle categorieën en bijbehorende FAQ's op
        return view('faq.index', compact('faqs'));
    }

    // Maak een nieuwe FAQ
    public function create()
    {
        $categories = FaqCategory::all();  // Haal alle categorieën op voor de dropdown
        return view('faq.create', compact('categories'));
    }

    // Opslaan van een nieuwe FAQ
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'category_id' => 'required',
        ]);

        Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('faq.index')->with('success', 'FAQ toegevoegd');
    }

    // Bewerken van een FAQ
    public function edit($faq)
    {
        $faq = Faq::findOrFail($faq);
        $categories = FaqCategory::all();  // Haal de categorieën op
        return view('faq.edit', compact('faq', 'categories'));
    }

    // Bijwerken van een FAQ
    public function update(Request $request, $faq)
    {
        $faq = Faq::findOrFail($faq);

        $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'category_id' => 'required',
        ]);

        $faq->update([
            'question' => $request->question,
            'answer' => $request->answer,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('faq.index')->with('success', 'FAQ bijgewerkt');
    }

    // Verwijderen van een FAQ
    public function destroy($faq)
    {
        $faq = Faq::findOrFail($faq);
        $faq->delete();

        return redirect()->route('faq.index')->with('success', 'FAQ verwijderd');
    }
}
