<?php

use App\Http\Controllers\User\AdmissionProcess;
use App\Http\Controllers\User\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/status', [RegisterController::class, 'show']);
Route::post('/create-account', [RegisterController::class, 'store']);
Route::post('/request-files', [AdmissionProcess::class, 'requestFiles']);

// El sistema le notifica que quedó registrado.
// La persona ingresa al mismo sitio para terminar de cargar la documentación.
// El sistema notifica que debe presentar una prueba
// El usuario presenta la prueba
// El usuario debe seleccionar una fecha de entrevista
// 
