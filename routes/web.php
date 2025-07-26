<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PelangganController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Welcome Routes
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::post('/process-customer', [WelcomeController::class, 'processCustomerName'])->name('process.customer');

// Customer Routes
Route::prefix('pelanggan')->group(function () {
    Route::get('/menu', [PelangganController::class, 'menu'])->name('pelanggan.menu');
    Route::get('/cart', [PelangganController::class, 'cart'])->name('pelanggan.cart');
    Route::get('/checkout', [PelangganController::class, 'checkout'])->name('pelanggan.checkout');
    Route::get('/payment', [PelangganController::class, 'payment'])->name('pelanggan.payment');
});
