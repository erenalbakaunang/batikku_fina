<?php

use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
})->middleware(['role']);

Route::get('/layout/home', function(){ return view('layouts.home'); });
Route::get('/layout/guest', function(){ return view('layouts.guest'); });
Route::get('/layout/employee', function(){ return view('layouts.employee'); });
Route::get('/layout/checkout', function(){ return view('layouts.checkout'); });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'role'])->name('dashboard');

Route::middleware(['auth','role'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','role'])->group(function () {
    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
});

require __DIR__.'/auth.php';
