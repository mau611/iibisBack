<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Investigador;
use App\Models\Operacion;
use Illuminate\Http\Request;

class OperacionController extends Controller
{
    public function index($gestion)
    {
        $operaciones = (
            $gestion == "Todos" ?
            Operacion::with('investigador')->with('documentosVerificacion')->with('metas')->with('tipo')->orderBy('gestion', 'asc')->get() :
            Operacion::with('investigador')->with('documentosVerificacion')->with('metas')->with('tipo')->orderBy('gestion', 'asc')->where('gestion', $gestion)->get()
        );
        return $operaciones;
    }
    public function operacionesInvestigador($invId)
    {
        $operaciones = Operacion::where('investigador_id', $invId)->with('investigador')->with('documentosVerificacion')->with('metas')->with('tipo')->orderBy('gestion', 'asc')->get();
        return $operaciones;
    }
    public function store(Request $request)
    {
        $operacion = new Operacion();
        $operacion->numeroOperacion = $request->numeroOperacion;
        $operacion->operacion = $request->operacion;
        $operacion->producto = $request->producto;
        $operacion->indicador = $request->indicador;
        $operacion->lineaBase = $request->lineaBase;
        $operacion->medioVerificacion = $request->medioVerificacion;
        $operacion->inicio = $request->inicio;
        $operacion->fin = $request->fin;
        $operacion->categoriaProgramatica = $request->categoriaProgramatica;
        $operacion->monto = $request->monto;
        $operacion->gestion = $request->gestion;
        $operacion->investigador_id = $request->investigador_id;
        $operacion->tipo_id = $request->tipo_id;
        $operacion->objetivo_especifico_id = $request->objetivo_especifico_id;
        $operacion->subactividad_id = $request->subactividad_id;
        $operacion->save();
    }
    public function show(string $id)
    {
        $operacion = Operacion::with('investigador')->with('documentosVerificacion')->with('metas')->find($id);
        return $operacion;
    }
    public function update(Request $request, string $id)
    {
        $operacion = Operacion::findOrFail($id);
        $operacion->numeroOperacion = $request->numeroOperacion;
        $operacion->operacion = $request->operacion;
        $operacion->producto = $request->producto;
        $operacion->indicador = $request->indicador;
        $operacion->lineaBase = $request->lineaBase;
        $operacion->medioVerificacion = $request->medioVerificacion;
        $operacion->inicio = $request->inicio;
        $operacion->fin = $request->fin;
        $operacion->categoriaProgramatica = $request->categoriaProgramatica;
        $operacion->monto = $request->monto;
        $operacion->gestion = $request->gestion;
        $operacion->investigador_id = $request->investigador_id;
        $operacion->tipo_id = $request->tipo_id;
        $operacion->objetivo_especifico_id = $request->objetivo_especifico_id;
        $operacion->subactividad_id = $request->subactividad_id;
        $operacion->save();
        return $operacion;
    }
    public function destroy(string $id)
    {
        $operacion = Operacion::destroy($id);
        return $operacion;
    }
}
