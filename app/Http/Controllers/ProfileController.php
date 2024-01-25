<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Author;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $author = Author::where('user_id', $request->user()->id)->first();
        return view('profile.edit', [
            'user' => $request->user(),
            'author' => $author = Author::where('user_id', $request->user()->id)->first(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

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

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    /**
     * Обновление информации об авторе
     *
     * @param Illuminate\Http\Request
     *
     * @return Illuminate\Support\Facades\Redirect
     */
    public function author(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required'
        ]);
        $author = Author::where('id', $request->id)->first()->update([
            'firstName' => $request->firstname,
            'lastName' => $request->lastname,
            'genre' => $request->genre,
            'description' => $request->description
        ]);
        return Redirect::route('profile.author')->with('status', 'Информация обновленна');
    }
}
