<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Rute utama
Route::get('/', function () {
    return view('welcome');
});

// Rute untuk user
Route::get('/user/create', [UserController::class, 'create'])->name('users.create');
Route::get('/user', [UserController::class, 'index'])->name('users.index');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::get('/user/profile/{id}', [UserController::class, 'show'])->name('user.show');
