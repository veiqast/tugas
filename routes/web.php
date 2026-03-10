<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HillCipherController;

Route::post('/hill/encrypt', [HillCipherController::class, 'encrypt']);
Route::post('/hill/decrypt', [HillCipherController::class, 'decrypt']);

Route::get('/hill', function () {
    return view('hill');
});

Route::get('/', function () {
    return view('welcome');
});
