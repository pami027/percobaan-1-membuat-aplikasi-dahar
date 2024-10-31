<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

// Route untuk menampilkan semua menu
Route::get('/menus', [MenuController::class, 'index'])->name('menus.index');

// Route untuk menampilkan halaman pemesanan berdasarkan ID menu
Route::get('/menus/{id}', [MenuController::class, 'show'])->name('menus.show');

// Route untuk menyimpan pesanan
Route::post('/menus/store', [MenuController::class, 'store'])->name('menus.store');

// Route untuk menangani pembayaran sukses
Route::get('/payment/success/{id}', [PaymentController::class, 'success'])->name('payment.success');
