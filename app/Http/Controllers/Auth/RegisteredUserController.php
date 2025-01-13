<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Toon het registratieformulier.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Verwerk een registratieverzoek.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Check of de gebruiker een admin moet zijn
        $isAdmin = false;
        if ($request->email === 'admin@ehb.be') { // Bijv. admin email hardcoded
            $isAdmin = true;
        }

        // Maak de gebruiker aan
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $isAdmin, // Zet is_admin op basis van de check
        ]);

        // Trigger het event voor geregistreerde gebruiker
        event(new Registered($user));

        // Log de gebruiker in
        Auth::login($user);

        // Redirect naar dashboard (of naar een andere route die je wilt)
        return redirect(route('dashboard', absolute: false));
    }
}
