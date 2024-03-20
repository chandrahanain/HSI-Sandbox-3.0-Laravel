<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DiskonController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\TransaksiController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index']);

// Crud Data User
Route::get('/user', [UserController::class, 'index']);
Route::post('/user/store', [UserController::class, 'store']);
Route::post('/user/update/{id}', [UserController::class, 'update']);
Route::get('/user/destroy/{id}', [UserController::class, 'destroy']);

// Crud Data Jenis Barang
Route::get('/jenisbarang', [JenisBarangController::class, 'index']);
Route::post('/jenisbarang/store', [JenisBarangController::class, 'store']);
Route::post('/jenisbarang/update/{id}', [JenisBarangController::class, 'update']);
Route::get('/jenisbarang/destroy/{id}', [JenisBarangController::class, 'destroy']);

// Crud Data Barang
Route::get('/barang', [BarangController::class, 'index']);
Route::post('/barang/store', [BarangController::class, 'store']);
Route::post('/barang/update/{id}', [BarangController::class, 'update']);
Route::get('/barang/destroy/{id}', [BarangController::class, 'destroy']);

// Setting Diskon
Route::get('/setdiskon', [DiskonController::class, 'index']);
Route::post('/setdiskon/update/{id}', [DiskonController::class, 'update']);

// Setting Profile
Route::get('/profile', [UserController::class, 'profile']);
Route::post('/profile/update/{id}', [UserController::class, 'updateprofile']);

// Setting Profile
Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::get('/transaksi/create', [TransaksiController::class, 'create']);