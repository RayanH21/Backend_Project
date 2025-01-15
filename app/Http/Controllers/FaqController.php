<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;

class FaqController extends Controller
{
    public function index()
    {
        // Haal alle categorieën met de bijbehorende vragen op
        $faqs = FaqCategory::with('faqs')->get();

        return view('faq.index', compact('faqs'));
    }
}

