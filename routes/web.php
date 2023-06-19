<?php

use App\Http\Controllers\MemberController;



Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/register', [MemberController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [MemberController::class, 'register'])->name('register');

Route::get('/login', [MemberController::class, 'showLoginForm'])->name('login');
Route::post('/login', [MemberController::class, 'login'])->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [MemberController::class, 'dashboard'])->name('dashboard');
});

