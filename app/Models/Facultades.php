<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facultades extends Model
{
    use HasFactory;

    protected $table = 'facultades';

    protected $fillable = [
        'nombfacultad'
    ];

     public function programasAdscribe()
    {
        return $this->hasMany(ProgramaAdscribe::class, 'id_facultad', 'idfacultad');
    } 

    public function datosPersonales()
    {
        return $this->hasMany(DatoPersonal::class, 'id_facultad', 'idfacultad');
    }

    public function tesisAsesoradas()
    {
        return $this->hasMany(TesiAsesorada::class, 'id_facultad', 'idfacultad');
    }

    public function proyectosInscritos()
    {
        return $this->hasMany(ProyectoInscrito::class, 'id_facultad', 'idfacultad');
    }
}
