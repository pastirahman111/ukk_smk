<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
    
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'authenticate'])->name('login.proses');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// middleware admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    });

    Route::resource('kategori', KategoriController::class);
    Route::resource('buku', BukuController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('user', UserController::class);
    Route::get('transaksi/export/excel', [TransaksiController::class, 'exportExcel'])->name('transaksi.export.excel');
    Route::get('transaksi/export/print', [TransaksiController::class, 'print'])->name('transaksi.export.print');
    Route::resource('transaksi', TransaksiController::class);
});

// middleware siswa
Route::middleware(['auth', 'role:siswa'])->group(function () {

});