<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Index;
use App\Http\Controllers\Register;
use App\Http\Controllers\Welcome;
use App\Http\Controllers\CategoriesController;
<<<<<<< HEAD
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
=======
>>>>>>> b6132ce15a4948af630547c2df989d4244d7c71f

Route::get('/', [Index::class, 'index']);

Route::get('/register', [Register::class, 'register']);
Route::post('/register', [Register::class, 'store']);

Route::get('/login', [LoginController::class, 'login']);
Route::post('/login', [LoginController::class, 'auth']);

Route::get('/welcome', [Welcome::class, 'welcome']);

<<<<<<< HEAD
// Categories

=======
>>>>>>> b6132ce15a4948af630547c2df989d4244d7c71f
Route::get('/categories/create', [CategoriesController::class, 'create']);
Route::post('/categories', [CategoriesController::class, 'store']);

Route::get('/categories', [CategoriesController::class, 'index']);
Route::get('/categories/{id}', [CategoriesController::class, 'show']);


Route::get('/categories/{id}/edit', [CategoriesController::class, 'edit']);
Route::put('/categories/{id}', [CategoriesController::class, 'update']);


<<<<<<< HEAD
Route::delete('/categories/{id}', [CategoriesController::class, 'destroy']);

// Products

Route::get('/products', [ProductController::class, 'product']);

Route::get('/products/create', [ProductController::class, 'create']);

Route::get('/products/show', [ProductController::class, 'show']);

// Transaction

Route::get('/transaction', [TransactionController::class, 'index']);
Route::get('/transaction/add', [TransactionController::class, 'add']);


=======
Route::delete('/categories/{id}', [CategoriesController::class, 'destroy']);
>>>>>>> b6132ce15a4948af630547c2df989d4244d7c71f
