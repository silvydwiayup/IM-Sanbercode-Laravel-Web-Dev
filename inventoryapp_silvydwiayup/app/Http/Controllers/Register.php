<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Register extends Controller
{
    public function register()
    {
        return view('register');
    }
    
    public function store(Request $request)
    {
        $firstName = $request->input('firstname');
        $lastName = $request->input('lastname');

        return view('/welcome', ['firstname' => $firstName, 'lastname' => $lastName]);
    }
}
