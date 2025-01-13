<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Hier kun je data voor het admin-dashboard laden
        return view('admin.dashboard');  // Zorg ervoor dat je een view voor dashboard hebt
    }
}
