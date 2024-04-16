<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaDocumento extends Model
{
    use HasFactory;
    protected $fillable = ['meta', 'periodo', 'documento_verificacion_id'];
    public function documentoVerificacion()
    {
        return $this->belongsTo(DocumentoVerificacion::class);
    }
}
