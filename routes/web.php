<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DatasetController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Rute untuk menampilkan halaman login
Route::get('/login', function () {
    return view('layouts.login');
})->name('login');

// Rute untuk logout
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/auth/redirect', [App\Http\Controllers\GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/google/redirect', [App\Http\Controllers\GoogleController::class, 'handleGoogleCallback'])->name('google.callback');

Route::get('/data/{user}/{id}', [DatasetController::class, 'detail_dataset']);

Route::get('/user/dataset', [DatasetController::class, 'kelolah_dataset']);

Route::prefix('admin')->group(function () {
    Route::prefix('menunggu-konfirmasi')->group(function () {
        Route::get('/', [DatasetController::class, 'menunggu_konfirmasi']);
        Route::get('/delete/{kode}', [DatasetController::class, 'tolak_dataset']);
        Route::get('/accept/{kode}', [DatasetController::class, 'terima_dataset']);
    });
    
    Route::get('/telah-konfirmasi', function () {
        return view('pages.user.admin.TelahDikonfirmasi');
    });
});

