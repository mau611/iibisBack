<?php

use App\Http\Controllers\Api\ActividadController;
use App\Http\Controllers\Api\ComponenteController;
use App\Http\Controllers\Api\DocumentoSeguimientoController;
use App\Http\Controllers\Api\DocumentosVerificacionController;
use App\Http\Controllers\Api\OperacionController;
use App\Http\Controllers\Api\ReportesController;
use App\Http\Controllers\Api\SeguimientoController;
use App\Http\Controllers\IibismedController;
use App\Http\Controllers\SispoasController;
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

Route::controller(SispoasController::class)->group(function () {
    Route::get('/sispoas_inv/{invId}', 'sispoasInvestigador');
    Route::get('/sispoas', 'sispoas');
});

Route::controller(ComponenteController::class)->group(function () {
    Route::get('/componente/{id}', 'show');
});

Route::controller(ActividadController::class)->group(function () {
    Route::get('/actividad/{id}', 'show');
});

Route::controller(SeguimientoController::class)->group(function () {
    Route::post('/seguimiento_actividad/{actividadId}', 'storeSeguimientoActividad');
    Route::post('/seguimiento_gestion/{gestionId}', 'storeSeguimientoGestion');
});

Route::controller(DocumentoSeguimientoController::class)->group(function () {
    Route::post('/documento_seguimiento_actividad/{seguimientoId}', 'storeDocumentoSeguimientoActividad');
    Route::post('/documento_seguimiento_gestion/{gestionId}', 'storeDocumentoSeguimientoGestion');
});

Route::controller(IibismedController::class)->group(function () {
    Route::get('/proyecto_iibismed/{id}', 'getProyectoIibismed');
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
Route::get('/seguimiento_actividad_file/{nombreArchivo}', function ($nombreArchivo) {
    return asset("storage/seguimientos_actividad/$nombreArchivo");
});
Route::get('/seguimiento_gestion_file/{nombreArchivo}', function ($nombreArchivo) {
    return asset("storage/seguimientos_gestion/$nombreArchivo");
});
