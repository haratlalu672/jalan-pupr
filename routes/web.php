<?php

use App\Http\Controllers\{JalanController, PrioritasController, UserController};
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
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('data', AdministratorController::class);
    Route::resource('data', JalanController::class);
    Route::resource('pengelolaan', PrioritasController::class);
    Route::resource('user', UserController::class);
});
