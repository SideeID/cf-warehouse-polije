<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DatasetController;
use App\Http\Middleware\ProtectAdmin;
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
Route::middleware(['auth'])->group(function () {
    Route::middleware([ProtectAdmin::class])->group(function () {
        Route::prefix('admin')->group(function () {
            Route::prefix('menunggu-konfirmasi')->group(function () {
                Route::get('/', [DatasetController::class, 'menunggu_konfirmasi']);
                Route::get('/delete/{kode}', [DatasetController::class, 'tolak_dataset']);
                Route::get('/accept/{kode}', [DatasetController::class, 'terima_dataset']);
            });

            Route::prefix('telah-konfirmasi')->group(function () {
                Route::get('/', [DatasetController::class, 'telah_konfirmasi']);
            });
        });
    });

    Route::prefix('user')->group(function () {
        Route::prefix('dataset')->group(function () {
            Route::get('', [DatasetController::class, 'kelolah_dataset']);
            Route::post('/add', [DatasetController::class, 'add_dataset']);
            Route::post('/update/{id}', [DatasetController::class, 'update_dataset']);
            Route::get('/delete/{id}', [DatasetController::class, 'delete_dataset']);
        });
    });
});

Route::get('/login', function () {
    return view('layouts.login');
})->name('login');


Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/auth/redirect', [App\Http\Controllers\GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/google/redirect', [App\Http\Controllers\GoogleController::class, 'handleGoogleCallback'])->name('google.callback');

Route::get('/data/{user}/{id}', [DatasetController::class, 'detail_dataset']);

Route::get('/dataset', [HomeController::class, 'dataset'])->name('dataset.dataset');
Route::get('/dataset/create', [HomeController::class, 'create'])->name('dataset.create');
Route::post('/dataset/create', [HomeController::class, 'create'])->name('dataset.create')->middleware('auth');
Route::get('/download/{name}/{id}', [DatasetController::class, 'download']);
