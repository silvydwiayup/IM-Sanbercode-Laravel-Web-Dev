<?php

namespace App\Http\Controllers;
use App\Models\UserModels;
use Illuminate\Support\Facades\Hash;

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

        $user = UserModels::where('email', $validatedData['email'])->first();

        if ($user && Hash::check($validatedData['password'], $user->password)) {
            return redirect('/welcome')->with([
                'name' => $user->name,
                'email' => $user->email
            ]);
        }else{
            return redirect()->back()->withErrors(['error' => 'Email atau Password Salah']);
        }
    }
}
