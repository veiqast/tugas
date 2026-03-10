<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CipherController;

Route::get('/caesar', [CipherController::class, 'index']);
Route::post('/caesar', [CipherController::class, 'process']);

Route::get('/hill', function () {
    return view('hill');
});

Route::get('/', function () {
    return view('welcome');
});
