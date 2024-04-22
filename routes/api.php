<?php

use App\Http\Controllers\Api\OperacionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(OperacionController::class)->group(function () {
    Route::get('/operaciones/{gestion}', 'index');
    Route::post('/operacion', 'store');
    Route::get('/operacion/{id}', 'show');
    Route::put('/operacion/{id}', 'update');
    Route::delete('/operacion/{id}', 'destroy');
});
