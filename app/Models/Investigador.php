<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investigador extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombres',
        'apellidos',
        'ci',
        'correo',
        'celular',
        'fechaNacimiento'
    ];
    public function datosIibismed()
    {
        return $this->hasMany(DatosIibismed::class);
    }
    public function lineasDeInvestigacion()
    {
        return $this->hasMany(LineaInvestigacion::class);
    }

    public function operaciones()
    {
        return $this->hasMany(Operacion::class);
    }
    public function titulos()
    {
        return $this->hasMany(TituloPosGradual::class);
    }
}
