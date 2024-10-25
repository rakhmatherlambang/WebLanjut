<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/create', [UserController::class, 'create'] );

Route::get('/user', [UserController::class, 'index'] ) -> name('users.index');

Route::POST('/user/store', [UserController::class, 'store'] ) -> name('user.store');

Route::get('/user/profile/{id}', [UserController::class, 'show'] ) -> name('user.show');