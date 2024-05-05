<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreparacionFormal extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_grado_academico',
        'estatus',
        'titulo',
        'ano_titulo',
        'pais',
        'tipo',
        'modalidad',
        'institucion_superior',
        'financiamiento',
        'ruta',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function programaAdscribe()
    {
        return $this->belongsTo(ProgramaAdscribe::class, 'id_programa_adscribe');
    }

    public function gradoAcademico()
    {
        return $this->belongsTo(GradoAcademicoPreparacionFormal::class, 'id_grado_academico');
    }
}
