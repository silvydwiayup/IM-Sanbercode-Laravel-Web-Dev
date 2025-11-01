<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Index;
use App\Http\Controllers\Register;
use App\Http\Controllers\Welcome;
use App\Http\Controllers\CategoriesController;

Route::get('/', [Index::class, 'index']);

Route::get('/register', [Register::class, 'register']);
Route::post('/register', [Register::class, 'store']);

Route::get('/welcome', [Welcome::class, 'welcome']);

Route::get('/categories/create', [CategoriesController::class, 'create']);
Route::post('/categories', [CategoriesController::class, 'store']);

Route::get('/categories', [CategoriesController::class, 'index']);
Route::get('/categories/{id}', [CategoriesController::class, 'show']);


Route::get('/categories/{id}/edit', [CategoriesController::class, 'edit']);
Route::put('/categories/{id}', [CategoriesController::class, 'update']);


Route::delete('/categories/{id}', [CategoriesController::class, 'destroy']);