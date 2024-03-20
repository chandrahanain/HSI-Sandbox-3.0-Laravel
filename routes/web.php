<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index']);

Route::get('/user', [UserController::class, 'index']);
Route::post('/user/store', [UserController::class, 'store']);
Route::post('/user/update/{id}', [UserController::class, 'update']);
Route::get('/user/destroy/{id}', [UserController::class, 'destroy']);
