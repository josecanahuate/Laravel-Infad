<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradoAcademico extends Model
{
    use HasFactory;

    protected $table = 'grado_academico';
    protected $primaryKey = 'idgradoacademico';

    protected $fillable = [
        'nombgradoacademico',
    ];

    public function tesisAsesoradas()
    {
        return $this->hasMany(TesiAsesorada::class, 'id_grado_academico');
    }

    public function preparacionFormales()
    {
    return $this->hasMany(PreparacionFormal::class, 'id_grado_academico');
    }

    

}
