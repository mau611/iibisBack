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
        $seguimientoActividad->porcentajeAvance = $request->porcentajeAvance;
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
        $seguimiento->porcentajeAvance = $request->porcentajeAvance;
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
