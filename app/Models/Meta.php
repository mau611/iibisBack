<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    use HasFactory;
    protected $fillable = ['meta', 'periodo', 'operacion_id'];
    public function operacion()
    {
        return $this->belongsTo(Operacion::class);
    }
}
