<?php

use App\Http\Controllers\User\CheckAdmissionProcess;
use App\Http\Controllers\User\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

Route::post('/create-account', [RegisterController::class, 'webStore'])->name('create-account');
Route::get('/mi-cuenta', [CheckAdmissionProcess::class, 'index'])->name('user.panel.index');
Route::get('/mis-documentos', [CheckAdmissionProcess::class, 'documents'])->name('user.panel.documents');