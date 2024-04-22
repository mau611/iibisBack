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
    public function metas()
    {
        return $this->hasMany(MetaDocumento::class);
    }
}
