<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Middleware\HelloMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('hello', [HelloController::class, 'index'])->middleware(HelloMiddleware::class);
Route::post('hello', [HelloController::class, 'post']);