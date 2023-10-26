<?php

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

Route::get('/', function () {
    return view('layouts.main');
});

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

