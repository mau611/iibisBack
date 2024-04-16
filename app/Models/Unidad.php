<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];
    public function datosIibismed()
    {
        return $this->hasMany(DatosIibismed::class);
    }
    public function documentosVerificacion()
    {
        return $this->hasMany(DocumentoVerificacion::class);
    }
}
