<?php

namespace App\Http\Controllers;

use App\Models\UserModels;
use App\Models\ProfileModels;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        $userAuth = Auth::user();

        $userData = UserModels::with('profile')->where('id', $userAuth->id)->firstOrFail();

        return view('profile.profile', compact('userData'));
    }

    public function edit()
    {
        $userAuth = Auth::user();

        $userData = UserModels::with('profile')->where('id', $userAuth->id)->firstOrFail();

        return view('profile.editProfile', compact('userData'));
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'inputAge' => 'required|integer|min:1|max:120',
            'inputBio' => 'required|string|max:500',
        ]);

        $user = Auth::user();

        $profile = ProfileModels::where('users_id', $user->id)->first();

        if ($profile) {
            $profile->update([
                'age' => $validated['inputAge'],
                'bio' => $validated['inputBio'],
            ]);
            $message = 'Profil berhasil diperbarui.';
        } else {
            ProfileModels::create([
                'users_id' => $user->id,
                'age' => $validated['inputAge'],
                'bio' => $validated['inputBio'],
            ]);
            $message = 'Profil baru berhasil dibuat.';
        }

        return redirect('/profile')->with('success', $message);
    }

}
