<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Welcome extends Controller
{
    public function welcome(Request $request)
    {
        $firstName = session('fname');
        $lastName = session('lname');

        return view('/welcome', ['firstname' => $firstName, 'lastname' => $lastName]);
    }
}
