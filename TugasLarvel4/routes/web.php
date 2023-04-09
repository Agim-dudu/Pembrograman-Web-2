<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\DataPenggunaController;

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
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'auth'])->name('login.auth');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard', [DashboardController::class, 'showDataBarang'])->name('dashboard.showDataBarang');

    Route::group(['middleware' => ['admin']], function(){
        Route::get('/data_pengguna', [DataPenggunaController::class, 'showDataPengguna'])->name('dp.showDataPengguna');
        Route::post('/data_pengguna', [DataPenggunaController::class, 'store'])->name('dp.store');
        Route::delete('/data_pengguna/{delete}', [DataPenggunaController::class, 'destroy'])->name('dp.destroy');
        Route::get('/data_pengguna/{edit}', [DataPenggunaController::class, 'edit'])->name('dp.edit');
        Route::put('/data_pengguna', [DataPenggunaController::class, 'update'])->name('dp.update');

        Route::get('/data_barang', [DataBarangController::class, 'showDataBarang'])->name('db.showDataBarang');
        Route::post('/data_barang', [DataBarangController::class, 'store'])->name('db.store');
        Route::delete('/data_barang/{delete}', [DataBarangController::class, 'destroy'])->name('db.destroy');
        Route::get('/data_barang/{edit}', [DataBarangController::class, 'edit'])->name('db.edit');
        Route::put('/data_barang', [DataBarangController::class, 'update'])->name('db.update');

        

    });
});

