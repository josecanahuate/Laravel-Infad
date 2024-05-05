<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SedeEjecutora extends Model
{
    use HasFactory;

    protected $table = 'sede_ejecutora';

    public function proyectosInscritos()
    {
        return $this->hasMany(ProyectoInscrito::class, 'id_sede_ejecutora');
    }

    public function tesisAsesoradas()
    {
        return $this->hasMany(TesiAsesorada::class, 'id_sede_ejecutora');
    }

    public function seminariosDictados()
    {
        return $this->hasMany(SeminarioDictado::class, 'id_sede_ejecutora');
    }
}
