<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosIibismed extends Model
{
    use HasFactory;
    protected $fillable = [
        'cargo',
        'fechaIngreso',
        'horas',
        'resolucion',
        'tituloNacional',
        'fechaTituloNacional',
        'investigador_id',
        'unidad_id'
    ];
    public function investigador()
    {
        return $this->belongsTo(Investigador::class);
    }
    public function unidad()
    {
        return $this->belongsTo(Unidad::class);
    }
}
