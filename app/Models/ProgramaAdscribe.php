<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramaAdscribe extends Model
{
    use HasFactory;

    protected $table = 'programa_adscribe';
    
    public function proyectosInscritos()
    {
        return $this->hasMany(ProyectoInscrito::class, 'id_programa_adscribe');
    }

    public function tesisAsesoradas()
    {
        return $this->hasMany(TesiAsesorada::class, 'id_programa_adscribe');
    }

    public function preparacionesFormales()
    {
        return $this->hasMany(PreparacionFormal::class, 'id_programa_adscribe');
    }


    public function participacionesCongresos()
    {
        return $this->hasMany(ParticipacionCongreso::class, 'id_programa_adscribe');
    }

    public function seminariosDictados()
    {
        return $this->hasMany(SeminarioDictado::class, 'id_programa_adscribe');
    }
}
