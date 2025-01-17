<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\NewsController;

// Publieke routes (voor iedereen toegankelijk)
Route::get('/', function () {
    return view('welcome'); // Startpagina
})->name('home');

Route::get('/faq', [FaqController::class, 'index'])->name('faq.index'); // FAQ-pagina
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index'); // Contactpagina
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store'); // Contactformulier verzenden
Route::get('/news', [NewsController::class, 'index'])->name('news.index'); // Nieuws overzicht
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show'); // Nieuws detailpagina

// Routes voor ingelogde gebruikers
Route::middleware(['auth'])->group(function () {
    // Dashboard route
    Route::get('/dashboard', function () {
        $discussions = \App\Models\Discussion::latest()->take(5)->get(); // Recentste 5 discussies
        return view('dashboard', compact('discussions'));
    })->name('dashboard');

    // Gebruikersprofiel routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Discussies routes
    Route::get('/discussions', [DiscussionController::class, 'index'])->name('discussions.index');
    Route::get('/discussions/create', [DiscussionController::class, 'create'])->name('discussions.create');
    Route::post('/discussions', [DiscussionController::class, 'store'])->name('discussions.store');
    Route::get('/discussions/{discussion}', [DiscussionController::class, 'show'])->name('discussions.show');
    Route::post('/discussions/{discussion}/replies', [ReplyController::class, 'store'])->name('replies.store');
});

// Routes voor admins
Route::middleware(['auth', 'admin'])->group(function () {
    // Admin gebruikersbeheer
    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [AdminUserController::class, 'create'])->name('users.create');
    Route::post('/users', [AdminUserController::class, 'store'])->name('users.store');
    Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');
    Route::put('/users/{user}/promote', [AdminUserController::class, 'promote'])->name('users.promote');
    Route::put('/users/{user}/demote', [AdminUserController::class, 'demote'])->name('users.demote');

    // Admin nieuwsbeheer
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/news/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');

    // Admin FAQ beheer
    Route::resource('faqs', FaqController::class)->except('show'); // Admin-only FAQ beheer
});

// Auth routes (login, registratie, wachtwoord reset)
require __DIR__ . '/auth.php';
