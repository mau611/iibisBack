<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectoSispoa extends Model
{
    use HasFactory;
    protected $fillable = [
        'tituloProyecto',
        'presupuestoTotal',
        'inicio',
        'fin',
        'objetivoGeneral',
        'finalidad',
        'justificacion',
        'beneficiarios',
        'resultadosPrincipales',
        'financiamiento',
        'tipo_id',
        'investigador_id',
    ];
    public function investigador()
    {
        return $this->belongsTo(Investigador::class);
    }
    public function tipoProyectoOperacion()
    {
        return $this->belongsTo(Tipo::class);
    }
    public function proyectos()
    {
        return $this->hasMany(ProyectoIibismed::class)->with('componentes');
    }
}
