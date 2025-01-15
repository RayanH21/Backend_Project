<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\DiscussionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Admin-routes (alleen toegankelijk voor admins)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

// Standaard gebruikersdashboard route met recente discussies
Route::get('/dashboard', [DiscussionController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Discussies routes
Route::middleware(['auth'])->group(function () {
    // Overzicht van alle discussies
    Route::get('/discussions', [DiscussionController::class, 'index'])->name('discussions.index');
    
    // Formulier om een nieuwe discussie te maken
    Route::get('/discussions/create', [DiscussionController::class, 'create'])->name('discussions.create');
    
    // Opslaan van een nieuwe discussie
    Route::post('/discussions', [DiscussionController::class, 'store'])->name('discussions.store');
    
    // Specifieke discussie tonen
    Route::get('/discussions/{discussion}', [DiscussionController::class, 'show'])->name('discussions.show');
});

// Gebruikersroutes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
