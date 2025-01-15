<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AdminFaqController;
use App\Http\Controllers\ContactController; // Voeg deze import toe
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Publieke FAQ-pagina
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

// Admin-routes (alleen toegankelijk voor admins)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/faq', [AdminFaqController::class, 'index'])->name('admin.faq.index');
    Route::post('/admin/faq', [AdminFaqController::class, 'store'])->name('admin.faq.store');
    Route::put('/admin/faq/{faq}', [AdminFaqController::class, 'update'])->name('admin.faq.update');
    Route::delete('/admin/faq/{faq}', [AdminFaqController::class, 'destroy'])->name('admin.faq.destroy');
});

// Standaard gebruikersdashboard route met recente discussies
Route::get('/dashboard', function () {
    $discussions = \App\Models\Discussion::latest()->take(5)->get(); // Haalt de recentste 5 discussies op
    return view('dashboard', compact('discussions')); // Stuurt $discussions door naar de view
})->middleware(['auth', 'verified'])->name('dashboard');

// Discussies routes
Route::middleware(['auth'])->group(function () {
    Route::get('/discussions', [DiscussionController::class, 'index'])->name('discussions.index');
    Route::get('/discussions/create', [DiscussionController::class, 'create'])->name('discussions.create');
    Route::post('/discussions', [DiscussionController::class, 'store'])->name('discussions.store');
    Route::get('/discussions/{discussion}', [DiscussionController::class, 'show'])->name('discussions.show');
    Route::post('/discussions/{discussion}/replies', [ReplyController::class, 'store'])->name('replies.store');
});

// Gebruikersroutes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Contactpagina routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index'); // Toon contactpagina
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store'); // Verzend contactformulier

require __DIR__.'/auth.php';
