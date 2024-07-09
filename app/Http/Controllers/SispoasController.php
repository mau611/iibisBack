<?php

namespace App\Http\Controllers;

use App\Models\ProyectoSispoa;
use Illuminate\Http\Request;

class SispoasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function sispoasInvestigador($invId)
    {
        $sispoasInvestigador = ProyectoSispoa::where('investigador_id', $invId)->with('proyectos')->get();
        return $sispoasInvestigador;
    }

    public function getProyectosByInvestigadorAndGestion($invId, $gestion)
    {
        $sispoasInvestigador = ProyectoSispoa::where('investigador_id', $invId)
            ->with([
                'proyectos' => function ($query) use ($gestion) {
                    $query->whereYear('inicioGestion', $gestion);
                }
            ])
            ->with('investigador')
            ->with('tipo')
            ->get();
        return $sispoasInvestigador;
    }

    public function sispoas()
    {
        $sispoas = ProyectoSispoa::with('proyectos')->get();
        return $sispoas;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
