<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('home');
});
Route::get('/login/admin', function () {
    return view('login_admin'); // nama view HARUS sama dengan nama file blade (tanpa .blade.php)
})->name('login.admin');

Route::get('/dashboard/admin', function () {
    return "Selamat datang di Dashboard Admin!";
})->name('admin.dashboard');
Route::get('/', function () {
    return view('home'); // ini file home.blade.php
})->name('home');

//dashboard admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// proteksi route admin
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});