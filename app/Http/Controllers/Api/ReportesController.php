<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ActividadInvestigacion;
use App\Models\Operacion;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function detalleOperaciones($gestion)
    {
        $query = Operacion::query()->with('documentosVerificacion', 'metas');
        return $gestion !== 'Todos' ? $query->where('gestion', $gestion)->get() : $query->get();
    }

    public function actividadesInvestigacion($gestion, $actividad)
    {
        $query = ActividadInvestigacion::with([
            'subactividades' => function ($query) use ($gestion) {
                $query->with([
                    'operaciones' => function ($query) use ($gestion) {
                        $gestion === "Todos" ? $query : $query->where('gestion', $gestion);
                    }
                ]);
            }
        ]);
        if ($actividad !== 'Todos') {
            $query->where('actividad', $actividad);
        }

        return $query->get();
    }
}
