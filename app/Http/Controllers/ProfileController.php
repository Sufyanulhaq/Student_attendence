<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\File\File;
use Illuminate\Http\UploadedFile;

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
         $user = Auth::user();

         // Update name and email
         $user->name = $request->input('name');
         $user->email = $request->input('email');
         $user->save();

         // Handle profile picture upload
         if ($request->hasFile('profile_pic')) {
             $profile_pic = $request->file('profile_pic');

             // Check if user already has a profile picture
             if ($user->profile_pic) {
                 // Delete existing profile picture
                 Storage::delete($user->profile_pic);
             }

             // Store new profile picture
             $path = $profile_pic->store('profile_pictures');
             $user->profile_pic = $path;
             $user->save();
         }

         return Redirect::route('profile.edit')->with('status', 'Profile updated successfully.');
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

        // Delete the profile picture from the public/profile_pics folder and database if it exists
        if ($user->profile_pic) {
            Storage::delete('public/profile_pics/' . $user->profile_pic);
        }

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
