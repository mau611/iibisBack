<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineaInvestigacion extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'investigador_id'
    ];
    public function investigador()
    {
        return $this->belongsTo(Investigador::class);
    }
}
