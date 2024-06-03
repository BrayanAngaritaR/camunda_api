<?php

use App\Http\Controllers\User\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/status/{id}', [RegisterController::class, 'show']);
Route::post('/create-account', [RegisterController::class, 'store']);