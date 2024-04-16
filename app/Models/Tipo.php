<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $fillable = [
        'nombre'
    ];
    public function operaciones()
    {
        return $this->hasMany(Operacion::class);
    }
}
