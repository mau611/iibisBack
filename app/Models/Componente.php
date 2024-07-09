<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Componente extends Model
{
    use HasFactory;
    protected $fillable = [
        'nroComponente',
        'componenteProyecto',
        'peso',
        'investigador_id',
        'proyecto_iibismed_id'
    ];
    public function actividades()
    {
        return $this->hasMany(Actividad::class)->with('investigador')->with('seguimientos');
    }
    public function investigador()
    {
        return $this->belongsTo(Investigador::class);
    }
    public function proyectoIibismed()
    {
        return $this->belongsTo(ProyectoIibismed::class);
    }
}
