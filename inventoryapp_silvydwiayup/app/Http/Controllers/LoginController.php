<?php

namespace App\Http\Controllers;
use App\Models\UserModels;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
        return view('/login');
    }

    public function auth(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        if (Auth::attempt($validatedData)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

        // $user = UserModels::where('email', $validatedData['email'])->first();

        // if ($user && Hash::check($validatedData['password'], $user->password)) {
        //     return redirect('/');
        // }else{
        //     return redirect()->back()->withErrors(['error' => 'Email atau Password Salah']);
        // }
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }
}
