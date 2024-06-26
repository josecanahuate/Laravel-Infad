<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnfasisActualizacion extends Model
{
    use HasFactory;

    protected $table = 'enfasis_actualizacion';
    protected $fillable = ['nombrenfasis'];

    public function preparacionConstante()
    {
        return $this->hasMany(PreparacionConstante::class, 'id_enfasis_actualizacion', 'idenfasis');
    }

    public function tesisAsesoradas()
    {
        return $this->hasMany(TesiAsesorada::class, 'id_enfasis_actualizacion', 'idenfasis');
    }

    public function proyectosInscritos()
    {
        return $this->hasMany(ProyectoInscrito::class, 'id_enfasis_actualizacion', 'idenfasis');
    }

}
