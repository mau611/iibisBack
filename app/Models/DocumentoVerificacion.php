<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentoVerificacion extends Model
{
    use HasFactory;
    protected $fillable = [
        'operacion_id',
        'unidad_id',
    ];
    public function operacion()
    {
        return $this->belongsTo(Operacion::class);
    }
    public function unidad()
    {
        return $this->belongsTo(Unidad::class);
    }
    public function meta()
    {
        return $this->hasOne(MetaDocumento::class);
    }
    public function archivosVerificacion()
    {
        return $this->hasMany(ArchivoVerificacion::class);
    }
}
