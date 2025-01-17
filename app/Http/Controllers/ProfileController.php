<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Update de velden met gevalideerde data
        $user->fill($request->validated());

        // Update optionele velden
        if ($request->filled('birthdate')) {
            $user->birthdate = $request->input('birthdate');
        }

        if ($request->filled('about_me')) {
            $user->about_me = $request->input('about_me');
        }

        // Verwijder oude profielfoto en sla een nieuwe op
        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo && Storage::disk('public')->exists($user->profile_photo)) {
                Storage::disk('public')->delete($user->profile_photo);
            }
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo = $path;
        }

        // Reset email verificatie als het emailadres verandert
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // Sla de bijgewerkte gegevens op
        $user->save();

        // Redirect terug naar de profielpagina met een succesmelding
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Log out the user
        Auth::logout();

        // Verwijder de gebruiker
        $user->delete();

        // Invalideer de sessie en genereer een nieuwe token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
