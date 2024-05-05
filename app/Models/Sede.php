<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    use HasFactory;

    protected $table = 'sedes';

    /**
     * Relación uno a muchos con ProyectoInscrito
     */
    public function proyectosInscritos()
    {
        return $this->hasMany(ProyectoInscrito::class, 'id_sede');
    }

    /**
     * Relación uno a muchos con TesisAsesorada
     */
    public function tesisAsesoradas()
    {
        return $this->hasMany(TesiAsesorada::class, 'id_sede');
    }

    /**
     * Relación uno a muchos con SeminarioDictado
     */
    public function seminariosDictados()
    {
        return $this->hasMany(SeminarioDictado::class, 'id_sede');
    }

    public function datosPersonales()
    {
    return $this->hasMany(DatoPersonal::class, 'id_sede');
    }

}
