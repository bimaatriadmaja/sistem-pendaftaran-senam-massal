<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

// Halaman utama langsung arahkan ke form pendaftaran
Route::get('/', [PesertaController::class, 'create'])->name('peserta.create');

// Login admin
Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdminAuthController::class, 'login']);
Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

// Halaman dashboard/admin (setelah login)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('peserta', PesertaController::class)->only(['edit', 'update', 'destroy']);
    Route::get('/admin/password', [AdminController::class, 'showChangePasswordForm'])->name('password.change.form');
    Route::post('/admin/password', [AdminController::class, 'changePassword'])->name('password.change');
});


    // Kalau kamu mau menambahkan fitur CRUD admin di sini, bisa juga:
    // Route::get('/admin/peserta', [PesertaController::class, 'index'])->name('peserta.index');
    // dst...
Route::resource('peserta', PesertaController::class)->only(['create','store']);
Route::get('/peserta/cek', [PesertaController::class, 'checkForm'])->name('peserta.checkForm');
Route::post('/peserta/cek', [PesertaController::class, 'checkData'])->name('peserta.checkData');