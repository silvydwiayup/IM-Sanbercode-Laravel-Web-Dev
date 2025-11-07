<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){
        return view('transaction.transactions');
    }

    public function add(){
        return view('transaction.addTransaction');
    }
}
