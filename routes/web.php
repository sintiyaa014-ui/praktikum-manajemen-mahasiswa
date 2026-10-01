<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Halaman Utama
Route::get('/', function () {
    return view('welcome');
});

// Group Route yang Membutuhkan Autentikasi Login
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route yang Dapat Diakses oleh Admin & User Biasa (Melihat Data)
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');

    // Route Privat Khusus Admin (Diproteksi Middleware Role)
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
        Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
        Route::get('/mahasiswa/{mahasiswa}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
        Route::put('/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
        Route::delete('/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
    });

    // Profile Management (Bawaan Laravel Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth Routes (Login, Register, Logout, Reset Password)
require __DIR__.'/auth.php';