<?php

namespace App\Http\Controllers;
use App\Models\UserModels;

use Illuminate\Http\Request;

class Register extends Controller
{
    public function register()
    {
        return view('register');
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        UserModels::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role' => 'staff',
        ]);

        return redirect('/welcome')->with([
            'name' => $validatedData['name'],
            'email' => $validatedData['email']
        ]);
    }
}
