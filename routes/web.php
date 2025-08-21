<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KaryawanController;

// Homepage
Route::get('/', function () {
    return view('home');
})->name('home');

// Login & Logout
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard Manager & Karyawan
Route::middleware('auth:manager')->get('/manager/dashboard', function () {
    return view('manager.dashboard');
})->name('manager.dashboard');

Route::middleware('auth:karyawan')->get('/karyawan/dashboard', function () {
    return view('karyawan.dashboard');
})->name('karyawan.dashboard');

// ----------------- ADMIN ROUTES -----------------
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Menu Admin
    Route::get('/absensi', [AdminController::class, 'absensi'])->name('admin.absensi');
    Route::get('/payroll', [AdminController::class, 'payroll'])->name('admin.payroll');
    Route::get('/laporan', [AdminController::class, 'laporan'])->name('admin.laporan');
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');

    // CRUD Data Karyawan
    Route::get('/data-karyawan', [KaryawanController::class, 'index'])->name('admin.data_karyawan');
    Route::post('/data-karyawan', [KaryawanController::class, 'store'])->name('admin.data_karyawan.store');
    Route::put('/data-karyawan/{id}', [KaryawanController::class, 'update'])->name('admin.data_karyawan.update');
    Route::delete('/data-karyawan/{id}', [KaryawanController::class, 'destroy'])->name('admin.data_karyawan.destroy');
});