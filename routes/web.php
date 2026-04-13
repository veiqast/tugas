<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\CipherController;

// LOGIN
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'prosesLogin']);
Route::get('/logout', [AuthController::class, 'logout']);

// DASHBOARD (optional)
Route::get('/dashboard', [AuthController::class, 'dashboard']);

// PENGGUNA (HARUS LOGIN)
Route::get('/pengguna', [PenggunaController::class, 'index']);
Route::post('/pengguna/store', [PenggunaController::class, 'store']);
Route::post('/pengguna/update/{id}', [PenggunaController::class, 'update']);
Route::get('/pengguna/delete/{id}', [PenggunaController::class, 'destroy']);

// CIPHER
Route::get('/caesar', [CipherController::class, 'index']);
Route::post('/caesar', [CipherController::class, 'process']);

// DEFAULT
Route::get('/', function () {
    return redirect('/login');
});
