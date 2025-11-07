<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Welcome extends Controller
{
    public function welcome(Request $request)
    {
        $name = session('name');
        $email = session('email');

        return view('/welcome', ['name' => $name, 'email' => $email]);
    }
}
