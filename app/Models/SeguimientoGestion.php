<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeguimientoGestion extends Model
{
    use HasFactory;
    public function documentos()
    {
        return $this->hasMany(DocSegGestion::class);
    }
}
