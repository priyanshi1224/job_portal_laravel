<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/account/registerPage', [AccountController::class, 'registerPage'])->name('account.registerPage');
Route::post('/account/registerUser', [AccountController::class, 'registerUser'])->name('account.registerUser');
Route::get('/account/loginPage', [AccountController::class, 'loginPage'])->name('account.loginPage');
Route::post('/account/authenticate', [AccountController::class, 'authenticate'])->name('account.authenticate');
Route::get('/account/profile', [AccountController::class, 'profile'])->name('account.profile');