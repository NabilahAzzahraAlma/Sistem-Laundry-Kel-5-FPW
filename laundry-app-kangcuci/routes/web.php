<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman Depan -> Redirect ke Login
Route::get('/', function () {
    return redirect()->route('login');
});

// GROUP MENU ADMIN (Wajib Login)
Route::middleware(['auth', 'verified'])->group(function () {

    // 1. Dashboard (Pastikan ini mengarah ke Controller, BUKAN function() {...})
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/order', [OrderController::class, 'index']);
    // 2. Menu Lainnya
    Route::resource('orders', OrderController::class);
    Route::resource('services', ServicesController::class);
    Route::resource('users', UserController::class);
    Route::resource('complaints', ComplaintController::class); // <--- PASTIIN INI ADA
    Route::resource('transaksis', TransactionController::class);

    // 3. Profile (Bawaan Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Load route auth bawaan (Login, Register, dll)
require __DIR__.'/auth.php';
