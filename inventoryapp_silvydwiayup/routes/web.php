<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Index;
use App\Http\Controllers\Register;
use App\Http\Controllers\Welcome;

Route::get('/', [Index::class, 'index']);

Route::get('/register', [Register::class, 'register']);
Route::post('/register', [Register::class, 'store']);

Route::get('/welcome', [Welcome::class, 'welcome']);
