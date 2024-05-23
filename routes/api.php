<?php

use App\Http\Controllers\Api\DocumentosVerificacionController;
use App\Http\Controllers\Api\OperacionController;
use App\Http\Controllers\Api\ReportesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(OperacionController::class)->group(function () {
    Route::get('/operaciones/{gestion}', 'index');
    Route::get('/operaciones_investigador/{invId}', 'operacionesInvestigador');
    Route::post('/operacion', 'store');
    Route::get('/operacion/{id}', 'show');
    Route::put('/operacion/{id}', 'update');
    Route::delete('/operacion/{id}', 'destroy');
});

Route::controller(ReportesController::class)->group(function () {
    Route::get('/detalle_operaciones/{gestion}', 'detalleOperaciones');
    Route::get('/actividades_investigacion/{gestion}/{actividad}', 'actividadesInvestigacion');
});

Route::controller(DocumentosVerificacionController::class)->group(function () {
    Route::post('/documento_verificacion', 'store');
    Route::post('/archivos_verificacion/{docVerificacionId}', 'archivosVerificacion');
});

Route::get('/iibis_file/{nombreArchivo}', function ($nombreArchivo) {
    return asset("storage/documentos_verificacion/$nombreArchivo");
});
