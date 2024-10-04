<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\BukuController;

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


// Rute utama '/'
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('home');
    }
    return redirect()->route('login');
});

// Rute autentikasi
Auth::routes();

// Rute home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Route Pengguna
Route::resource('pengguna', UserController::class);

// Route Peminjaman
Route::resource('peminjaman', PeminjamanController::class);

// Route Pengembalian
Route::resource('pengembalian', PengembalianController::class);

// Route Buku
Route::resource('buku', BukuController::class);

// Route untuk pencarian buku
Route::get('books/search', [BukuController::class, 'search'])->name('books.search');



