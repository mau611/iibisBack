<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operacion extends Model
{
    use HasFactory;
    protected $fillable = [
        'numeroOperacion',
        'operacion',
        'producto',
        'indicador',
        'lineaBase',
        'medioVerificacion',
        'inicio',
        'fin',
        'categoriaProgramatica',
        'monto',
        'gestion',
        'investigador_id',
        'tipo_id',
        'objetivo_especifico_id',
        'subactividad_id'
    ];
    public function investigador()
    {
        return $this->belongsTo(Investigador::class);
    }
    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }
    public function ObjetivoEspecifico()
    {
        return $this->belongsTo(ObjetivoEspecifico::class);
    }
    public function subactividad()
    {
        return $this->belongsTo(Subactividad::class);
    }
    public function documentosVerificacion()
    {
        return $this->hasMany(DocumentoVerificacion::class);
    }
    public function metas()
    {
        return $this->hasMany(Meta::class);
    }
}
