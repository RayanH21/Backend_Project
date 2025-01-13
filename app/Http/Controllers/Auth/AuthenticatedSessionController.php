<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Toon de loginpagina.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Verwerk een inlogverzoek.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        // Regenereren van de sessie na een succesvolle login
        $request->session()->regenerate();

        // Controleer of de gebruiker een admin is
        if (Auth::user()->is_admin) {
            // Redirect naar het admin dashboard
            return redirect()->intended(route('admin.dashboard'));
        }

        // Anders stuur naar de standaard dashboard voor gebruikers
        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Vernietig een geauthenticeerde sessie.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        // Vernietig de sessie en regenereer de token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
