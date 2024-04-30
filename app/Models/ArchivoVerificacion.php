<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchivoVerificacion extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];
    public function documentoVerificacion()
    {
        return $this->belongsTo(DocumentoVerificacion::class);
    }
}
