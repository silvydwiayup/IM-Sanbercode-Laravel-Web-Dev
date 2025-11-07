<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Index;
use App\Http\Controllers\Register;
use App\Http\Controllers\Welcome;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;

Route::get('/', [Index::class, 'index']);

Route::get('/register', [Register::class, 'register']);
Route::post('/register', [Register::class, 'store']);

Route::get('/login', [LoginController::class, 'login']);
Route::post('/login', [LoginController::class, 'auth']);

Route::get('/welcome', [Welcome::class, 'welcome']);

// Categories

Route::get('/categories/create', [CategoriesController::class, 'create']);
Route::post('/categories', [CategoriesController::class, 'store']);

Route::get('/categories', [CategoriesController::class, 'index']);
Route::get('/categories/{id}', [CategoriesController::class, 'show']);


Route::get('/categories/{id}/edit', [CategoriesController::class, 'edit']);
Route::put('/categories/{id}', [CategoriesController::class, 'update']);


Route::delete('/categories/{id}', [CategoriesController::class, 'destroy']);

// Products

Route::get('/products', [ProductController::class, 'product']);

Route::get('/products/create', [ProductController::class, 'create']);

Route::get('/products/show', [ProductController::class, 'show']);

// Transaction

Route::get('/transaction', [TransactionController::class, 'index']);
Route::get('/transaction/add', [TransactionController::class, 'add']);

