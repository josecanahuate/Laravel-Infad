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
        return $this->hasMany(PreparacionConstante::class, 'id_enfasis_actualizacion');
    }

    public function tesisAsesoradas()
    {
        return $this->hasMany(TesiAsesorada::class, 'idenfasis');
    }

    public function proyectosInscritos()
    {
        return $this->hasMany(ProyectoInscrito::class, 'idenfasis');
    }
}
