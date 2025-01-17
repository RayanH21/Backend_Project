<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\NewsController;

// Publieke FAQ-pagina
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

// Admin-routes (alleen toegankelijk voor admins)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('faqs', FaqController::class)->except('show');
    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [AdminUserController::class, 'create'])->name('users.create');
    Route::post('/users', [AdminUserController::class, 'store'])->name('users.store');
    Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');
    Route::put('/users/{user}/promote', [AdminUserController::class, 'promote'])->name('users.promote');
    Route::put('/users/{user}/demote', [AdminUserController::class, 'demote'])->name('users.demote');
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

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
require __DIR__.'/auth.php';
