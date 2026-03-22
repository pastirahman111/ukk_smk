<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SiswaDashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'store'])->name('register.store');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.proses');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('siswa')->middleware(['auth', 'role:siswa'])->group(function () {
    Route::get('/index', [SiswaDashboardController::class, 'index']);

    Route::get('/detail', function () {
        return view('siswa.detail');
    });
});

// middleware admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    });

    Route::resource('kategori', KategoriController::class);
    Route::resource('buku', BukuController::class);
    Route::resource('siswa', SiswaController::class)->parameters(['siswa' => 'siswa']);
    Route::resource('user', UserController::class);
    Route::get('transaksi/export/excel', [TransaksiController::class, 'exportExcel'])->name('transaksi.export.excel');
    Route::get('transaksi/export/print', [TransaksiController::class, 'print'])->name('transaksi.export.print');
    Route::resource('transaksi', TransaksiController::class);
});
