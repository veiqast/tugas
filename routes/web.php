<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CipherController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenggunaController;

Route::middleware([])->group(function () {
    Route::get('/pengguna', [PenggunaController::class, 'index']);
    Route::post('/pengguna/store', [PenggunaController::class, 'store']);
    Route::post('/pengguna/update/{id}', [PenggunaController::class, 'update']);
    Route::get('/pengguna/delete/{id}', [PenggunaController::class, 'destroy']);
});

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'prosesLogin']);
Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', [AuthController::class, 'dashboard']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/caesar', [CipherController::class, 'index']);
Route::post('/caesar', [CipherController::class, 'process']);
