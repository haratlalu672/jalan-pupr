<?php

use App\Http\Controllers\{HistoryController, JalanController, PemeliharaanController, PerbaikanController, PrioritasController, UserController, WelcomeController};
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

Route::get('/', WelcomeController::class)->name('welcome');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('data', AdministratorController::class);
    Route::resource('data', JalanController::class);
    Route::resource('pengelolaan', PrioritasController::class);
    Route::resource('perbaikan', PerbaikanController::class);
    Route::resource('user', UserController::class);
    Route::resource('pemeliharaan', PemeliharaanController::class);
    Route::resource('arsip', HistoryController::class);
    Route::get('/data-jalan', [App\Http\Controllers\HistoryController::class, 'jalan'])->name('dataJalan');
    Route::get('/user/{user:id}/reset-password', [App\Http\Controllers\UserController::class, 'editPassword'])->name('edit');
    Route::patch('/user/{user:id}/reset', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('update');
    Route::prefix('cetak')->group(function () {
        Route::get('/jalan-detail/{jalan}', [App\Http\Controllers\CetakController::class, 'jalanDetail'])->name('cetakJalanDetail');
        Route::get('/surat-tugas/{perbaikan}', [App\Http\Controllers\CetakController::class, 'suratTugas'])->name('cetakSuratTugas');
        Route::get('/pegawai', [App\Http\Controllers\CetakController::class, 'cetakPegawai'])->name('cetakPegawai');
        Route::get('/detail-pegawai/{user}', [App\Http\Controllers\CetakController::class, 'detailPegawai'])->name('cetakPegawaiDetail');
        Route::get('/selesai-detail/{history}', [App\Http\Controllers\CetakController::class, 'cetakSelesaiDetail'])->name('cetakSelesaiDetail');
        Route::post('/selesai', [App\Http\Controllers\CetakController::class, 'cetakSelesai'])->name('cetakSelesai');
        Route::post('/jalan', [App\Http\Controllers\CetakController::class, 'cetakJalan'])->name('cetakJalan');
    });
});
