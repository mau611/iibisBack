<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;
    protected $fillable = [
        'actividad',
        'meta',
        'indicador',
        'fuenteVerificacion',
        'inicio',
        'fin',
        'peso',
        'investigador_id',
        'componente_id'
    ];

    public function investigador()
    {
        return $this->belongsTo(Investigador::class);
    }
    public function componente()
    {
        return $this->belongsTo(Componente::class);
    }
    public function seguimientos()
    {
        return $this->hasMany(SeguimientoActividad::class)->with('documentos');
    }
    public function documentos()
    {
        return $this->hasMany(ActividadDocumento::class);
    }
}
