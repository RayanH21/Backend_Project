<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        // Dit retourneert de contactpagina
        return view('contact.index');
    }

    public function store(Request $request)
    {
        // Valideer de invoer
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Verzend de e-mail
        Mail::to('your-email@example.com') // Vervang dit met je eigen e-mailadres
            ->send(new ContactMessage($request->all()));

        // Terug naar de contactpagina met een succesbericht
        return redirect()->route('contact.index')->with('success', 'Thank you for contacting us!');
    }
}

