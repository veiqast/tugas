<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CipherController;

Route::get('/caesar', [CipherController::class, 'index']);
Route::post('/caesar', [CipherController::class, 'process']);

Route::get('login', function () {
    return view('login');
});
Route::get('dashboard', function () {
    return view('dashboard');
});
Route::get('/', function () {
    return view('welcome');
});
