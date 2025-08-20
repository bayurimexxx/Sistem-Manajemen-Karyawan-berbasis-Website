<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/login/admin', function () {
    return view('login_admin'); // nama view HARUS sama dengan nama file blade (tanpa .blade.php)
})->name('login.admin');

Route::get('/login/karyawan', function () {
    return view('login_karyawan');
})->name('login.karyawan');

Route::get('/login/manager', function () {
    return view('login_manager'); // nama view HARUS sama dengan nama file blade (tanpa .blade.php)
})->name('login.manager');

Route::get('/dashboard/admin', function () {
    return "Selamat datang di Dashboard Admin!";
})->name('admin.dashboard');
Route::get('/', function () {
    return view('home'); // ini file home.blade.php
})->name('home');
