<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjetivoEspecifico extends Model
{
    use HasFactory;
    protected $fillable = ['objetivo'];
    public function operaciones()
    {
        return $this->hasMany(Operacion::class);
    }
}
