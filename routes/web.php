<?php

use App\Models\Orders;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\daftarController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\dashboardController;

Route::get('/', [loginController::class, 'index'])->name('login');

Route::post('/', [loginController::class, 'login'])->name('login');

Route::post('/logout', [loginController::class, 'logout']);

Route::get('/daftar', [daftarController::class, 'index']);

Route::post('/daftar', [daftarController::class, 'daftar']);

Route::get('/dashboard', [dashboardController::class, 'index']);

Route::get('/produk', [ProductController::class, 'index']);

Route::get('/cart', [CartController::class, 'index']);

Route::post('/cart', [CartController::class, 'addCart']);

Route::delete('/cart/remove', [CartController::class, 'removeFromCart']);

Route::delete('/cart/clear', [CartController::class, 'deleteAll']);

Route::get('/checkout', [CartController::class, 'checkout']);

Route::get('/order', [OrdersController::class, 'index']);

Route::post('/order', [OrdersController::class, 'addCart']);

Route::get('/admin', [AdminController::class, 'index'])->middleware('admin');


