<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Admin\ServiceController;

// Rotte per gli appuntamenti
Route::Resource('appointments', AppointmentController::class);

// Rotte per le recensioni
Route::Resource('reviews', ReviewController::class);

// Rotte per i servizi
Route::Resource('services', ServiceController::class);

// Rotta per ottenere l'utente autenticato (opzionale)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
