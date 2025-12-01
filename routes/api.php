<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpaceController;
use App\Http\Controllers\ReservationController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::apiResource('spaces', SpaceController::class);

// Route::middleware('auth:sanctum')->group(function () {
//     Route::apiResource('reservations', ReservationController::class);
// });
