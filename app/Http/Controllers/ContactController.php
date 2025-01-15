<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; // Voeg dit toe als je emails wilt verzenden

class ContactController extends Controller
{
    // Toon de contactpagina
    public function index()
    {
        return view('contact.index'); // Zorg ervoor dat je een view hebt voor de contactpagina
    }

    // Verzend het contactformulier
    public function store(Request $request)
    {
        // Validatie van het formulier
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Hier kun je een e-mail sturen naar de admin
        // Mail::to('admin@example.com')->send(new ContactFormMail($request->all()));

        // Feedback aan de gebruiker
        return redirect()->route('contact.index')->with('success', 'Thank you for contacting us!');
    }
}
