<?php

use App\Http\Controllers\User\AdmissionProcess;
use App\Http\Controllers\User\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/status', [RegisterController::class, 'show']);
Route::get('/documents-status', [RegisterController::class, 'showDocuments']);
Route::post('/create-account', [RegisterController::class, 'store']);
Route::post('/request-files', [AdmissionProcess::class, 'requestFiles']);
Route::post('/send-rejection', [AdmissionProcess::class, 'sendRejection']);
Route::post('/request-files-by-email', [AdmissionProcess::class, 'requestFilesByEmail']);
Route::post('/notify-score', [AdmissionProcess::class, 'notifyScore']);
Route::post('/notify-interview', [AdmissionProcess::class, 'notifyInterview']);
Route::post('/save-interview-results', [AdmissionProcess::class, 'saveInterviewResult']);
Route::post('/notify-rejection', [AdmissionProcess::class, 'notifyRejection']);
Route::post('/update-quota', [AdmissionProcess::class, 'updateQuota']);
// Route::get('/check-quota', [AdmissionProcess::class, 'checkQuota']);




// El sistema le notifica que quedó registrado.
// La persona ingresa al mismo sitio para terminar de cargar la documentación.
// El sistema simula que el usuario realiza el pago de la inscripción
// El sistema notifica que debe presentar una prueba
// El sistema simula que el usuario presenta la prueba
// El sistema notifica al usuario que debe realizar una entrevista
// El sistema simula que el usuario realiza el pago de la matrícula
// El sistema simula que el usuario decide RECHAZAR o ACEPTAR el cupo
