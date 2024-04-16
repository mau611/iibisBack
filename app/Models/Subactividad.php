<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subactividad extends Model
{
    use HasFactory;
    protected $fillable = ['subactividad', 'actividad_investigacion_id'];

    public function actividad()
    {
        return $this->belongsTo(ActividadInvestigacion::class);
    }
    public function operaciones()
    {
        return $this->hasMany(Operacion::class);
    }
}
