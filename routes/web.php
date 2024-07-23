<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserAccountController;

Route::get('/', [IndexController::class, 'index']);
Route::get('/hello', [IndexController::class, 'show'])->middleware('auth');

Route::resource('listing', ListingController::class)
    ->only(['create', 'destroy', 'store', 'edit', 'update'])
    ->middleware('auth');
Route::resource('listing', ListingController::class)
    ->except(['create', 'destroy', 'store', 'edit', 'update']);

Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::get('logout', [AuthController::class, 'destroy'])->name('logout');

Route::resource('user-account', UserAccountController::class)
    ->only(['create' ,'store', 'show']);

Route::post('register', [UserAccountController::class, 'store'])->name('register.store');
