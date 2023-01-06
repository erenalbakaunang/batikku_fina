<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\Pegawai\PenjualanController;
use App\Http\Controllers\Pegawai\ProdukController;
use App\Http\Controllers\Pegawai\ProfileController;
use App\Http\Controllers\ProfileController as PFController;
use Illuminate\Support\Facades\Route;

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

Route::get('/layout/home', function(){ return view('layouts.home'); });
Route::get('/layout/guest', function(){ return view('layouts.guest'); });
Route::get('/layout/employee', function(){ return view('layouts.employee'); });
Route::get('/layout/checkout', function(){ return view('layouts.checkout'); });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'role'])->name('dashboard');

// Route::middleware(['auth'])->group(function () {
//     Route::get('/profile', [PFController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [PFController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [PFController::class, 'destroy'])->name('profile.destroy');
// });

// Panel Pelanggan
Route::middleware(['pelanggan'])->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('index.home');
    Route::get('/product/{id}', [IndexController::class, 'product'])->name('index.product');
    Route::get('/about', [IndexController::class, 'about'])->name('index.about');
    
    Route::post('/search', [IndexController::class, 'search'])->name('index.search');
});

Route::middleware(['auth', 'pelanggan'])->group(function () {
    Route::get('/cart', [IndexController::class, 'cart'])->name('index.cart');

    Route::get('/checkout', [IndexController::class, 'checkout'])->name('index.checkout');
    Route::get('/checkout/{id}', [IndexController::class, 'order'])->name('index.order');

    Route::get('/profile', [IndexController::class, 'profile'])->name('index.profile');
    Route::post('/profile', [IndexController::class, 'profileUpdate'])->name('index.profileUpdate');
});

// Panel Pegawai
Route::middleware(['auth', 'pegawai'])->group(function () {
    // Profile
    Route::get('/pegawai/profile/index', [ProfileController::class, 'index'])->name('pegawai.profile.index');
    Route::post('/pegawai/profile/update', [ProfileController::class, 'update'])->name('pegawai.profile.update');
    
    // Produk
    Route::get('/pegawai/produk/index', [ProdukController::class, 'index'])->name('pegawai.produk.index');
    Route::get('/pegawai/produk/add', [ProdukController::class, 'add'])->name('pegawai.produk.add');
    Route::get('/pegawai/produk/edit', [ProdukController::class, 'edit'])->name('pegawai.produk.edit');
    Route::get('/pegawai/produk/delete', [ProdukController::class, 'delete'])->name('pegawai.produk.delete');
    Route::post('/pegawai/produk/insert', [ProdukController::class, 'insert'])->name('pegawai.produk.insert');
    Route::post('/pegawai/produk/update', [ProdukController::class, 'update'])->name('pegawai.produk.update');

    // Produk
    Route::get('/pegawai/penjualan/index', [PenjualanController::class, 'index'])->name('pegawai.penjualan.index');
    Route::get('/pegawai/penjualan/edit', [PenjualanController::class, 'edit'])->name('pegawai.penjualan.edit');
    Route::post('/pegawai/penjualan/update', [PenjualanController::class, 'update'])->name('pegawai.penjualan.update');
});

require __DIR__.'/auth.php';
