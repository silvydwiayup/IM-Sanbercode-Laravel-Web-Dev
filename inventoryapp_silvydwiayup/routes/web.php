<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Index;
use App\Http\Controllers\Register;
use App\Http\Controllers\Welcome;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProfileController;

Route::middleware(['guest'])->group(function () {
    
    Route::get('/register', [Register::class, 'register']);
    Route::post('/register', [Register::class, 'store']);
    
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'auth']);
    
});

Route::middleware(['auth'])->group(function () {

    Route::get('/', [Index::class, 'index'])->name('index')->middleware('auth');

    Route::get('/welcome', [Welcome::class, 'welcome']);
});

Route::post('/logout', [LoginController::class, 'logout']);


// Categories

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/categories/create', [CategoriesController::class, 'create']);
    Route::post('/categories', [CategoriesController::class, 'store']);
    
    Route::get('/categories', [CategoriesController::class, 'index']);
    Route::get('/categories/{id}', [CategoriesController::class, 'show']);
    
    
    Route::get('/categories/{id}/edit', [CategoriesController::class, 'edit']);
    Route::put('/categories/{id}', [CategoriesController::class, 'update']);
    
    
    Route::delete('/categories/{id}', [CategoriesController::class, 'destroy']);
});


// Products

Route::middleware(['auth'])->group(function () {
    Route::get('/products', [ProductController::class, 'index']);
    
    Route::get('/products/create', [ProductController::class, 'create']);
    
    Route::get('/products/show/{id}', [ProductController::class, 'show']);
    Route::post('/products', [ProductController::class, 'store']);
    
    Route::get('/products/{id}/edit', [ProductController::class, 'edit']);
    Route::put('/products/edit/{id}', [ProductController::class, 'update']);
    
    Route::delete('/products/delete/{id}', [ProductController::class, 'destroy']);
});


// Transaction

Route::middleware(['auth'])->group(function () {
    Route::get('/transaction', [TransactionController::class, 'index']);
    Route::get('/transaction/add', [TransactionController::class, 'add']);
    Route::post('/transaction/add', [TransactionController::class, 'store']);
});

// Profile

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'profile']);

    Route::get('/profile/edit', [ProfileController::class, 'edit']);
    Route::post('/profil/edit', [ProfileController::class, 'save']);

});

