<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SeguimientoActividad;
use App\Models\SeguimientoGestion;
use Illuminate\Http\Request;

class SeguimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeSeguimientoActividad(Request $request, $actividadId)
    {
        $seguimientoActividad = new SeguimientoActividad();
        $seguimientoActividad->estado = $request->estado;
        $seguimientoActividad->porcentajeAvance = $request->porcentajeAvance;
        $seguimientoActividad->meta = $request->meta;
        $seguimientoActividad->observacion = $request->observacion;
        $seguimientoActividad->modificar = $request->modificar;
        $seguimientoActividad->periodo = $request->periodo;
        $seguimientoActividad->actividad_id = $request->id;
        $seguimientoActividad->save();
        return response()->json([
            'message' => 'Seguimiento creado exitosamente',
            'seguimientoActividad' => $seguimientoActividad,
        ], 201);
    }

    public function storeSeguimientoGestion(Request $request, $gestionId)
    {
        $seguimiento = new SeguimientoGestion();
        $seguimiento->estado = $request->estado;
        $seguimiento->porcentajeAvance = $request->porcentajeAvance;
        $seguimiento->meta = $request->meta;
        $seguimiento->observacion = $request->observacion;
        $seguimiento->modificar = $request->modificar;
        $seguimiento->periodo = $request->periodo;
        $seguimiento->proyecto_iibismed_id = $request->id;
        $seguimiento->save();
        return response()->json([
            'message' => 'Seguimiento creado exitosamente',
            'seguimientoActividad' => $seguimiento,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
