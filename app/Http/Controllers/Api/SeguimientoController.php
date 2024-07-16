<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HabilitarSeguimiento;
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

    public function storeHabilitarSeguimiento(Request $request)
    {
        try {
            if ($request->habilitado) {
                HabilitarSeguimiento::where('gestion', $request->gestion)
                    ->where('habilitado', true)
                    ->update(['habilitado' => false]);
            }
            $existe = HabilitarSeguimiento::where('periodo', $request->periodo)
                ->where('gestion', $request->gestion)
                ->exists();
            if ($existe) {
                $habilitado = HabilitarSeguimiento::where('periodo', $request->periodo)->where('gestion', $request->gestion)->first();
                if ($habilitado->habilitado !== $request->habilitado) {
                    $habilitado->habilitado = $request->habilitado;
                    $habilitado->save();
                    return response()->json([
                        'message' => 'Habilitación modificada exitosamente',
                        'habilitado' => $habilitado,
                    ], 201);
                }
                return response()->json([
                    'error' => 'Ya existe una habilitación para este periodo y gestión.',
                ], 409);
            }
            $habilitacion = new HabilitarSeguimiento();
            $habilitacion->periodo = $request->periodo;
            $habilitacion->gestion = $request->gestion;
            $habilitacion->habilitado = $request->habilitado;
            $habilitacion->save();
            return response()->json([
                'message' => 'Habilitación creada exitosamente',
                'habilitacion' => $habilitacion,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al crear la habilitación',
                'details' => $e->getMessage(),
            ], 500);
        }
    }

    public function getSeguimientoPeriodosHabilitados($gestion)
    {
        $habilitados = HabilitarSeguimiento::where('gestion', $gestion)->get();
        return $habilitados;
    }
    public function getPeriodoHabilitado($gestion)
    {
        $habilitado = HabilitarSeguimiento::where('gestion', $gestion)->where('habilitado', true)->first();
        return $habilitado->periodo;
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
