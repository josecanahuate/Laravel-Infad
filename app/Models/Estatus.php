<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombrestatus',
        'descripcion'
    ];

    public function tesisAsesoradas()
    {
        return $this->hasMany(TesiAsesorada::class, 'idestatus');
    }

    public function proyectosInscritos()
    {
        return $this->hasMany(ProyectoInscrito::class, 'idestatus');
    }
}
