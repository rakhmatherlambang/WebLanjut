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
Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
