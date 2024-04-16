<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TituloPosgradual extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'anho',
        'universidad',
        'gradoObtenido',
        'archivo',
        'investigador_id'
    ];
    public function investigador()
    {
        return $this->belongsTo(Investigador::class);
    }
}
