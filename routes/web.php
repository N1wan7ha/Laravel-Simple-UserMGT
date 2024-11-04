<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Home route
Route::get('/', function () {
    return view('login');
});

// Authentication routes
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

// Login route for redirection after logout or access
Route::get('/login', function () {
    return view('login');
})->name('login');

// Dashboard route (protected by 'auth' middleware)
Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware('auth')->name('dashboard');

// Edit?update/Delete route
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');