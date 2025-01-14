<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\DiscussionController; // Zorg dat je de DiscussionController importeert
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Admin-routes (alleen toegankelijk voor admins)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    // Voeg hier andere admin-specifieke routes toe
});

// Standaard gebruikersdashboard route met recente discussies
Route::get('/dashboard', [DiscussionController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Gebruikersroutes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
