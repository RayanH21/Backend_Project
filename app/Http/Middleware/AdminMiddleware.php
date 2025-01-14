<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Debugging: Toon een bericht als de middleware actief is
        dd('Admin middleware actief');

        // Controleer of de gebruiker een admin is
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }

        // Als de gebruiker geen admin is, stuur naar het gebruikersdashboard
        return redirect('/dashboard')->with('error', 'Je hebt geen toegang tot deze pagina.');
    }
}
