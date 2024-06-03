<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectoIibismed extends Model
{
    use HasFactory;
    protected $fillable = [
        'producto',
        'indicador',
        'lineaBase',
        'metaTotal',
        'medioVerificacion',
        'inicioGestion',
        'finGestion',
        'categoriaProgramatica',
        'sisin',
        'dicyt',
        'montoGestion',
        'proyecto_sispoa_id',
    ];
    public function proyectoSispoa()
    {
        return $this->belongsTo(ProyectoSispoa::class);
    }
    public function documentos()
    {
        return $this->hasMany(DocumentoGestion::class);
    }
    public function componentes()
    {
        return $this->hasMany(Componente::class);
    }
    public function metasPeriodo()
    {
        return $this->hasMany(MetaPeriodoIibismed::class);
    }
    public function seguimiento()
    {
        return $this->hasOne(SeguimientoGestion::class)->with('documentos');
    }
}
