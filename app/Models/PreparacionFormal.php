<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreparacionFormal extends Model
{
    use HasFactory;

    protected $table = 'preparacion_formal';
    protected $fillable = [
        'id_grado_academico',
        //'estatus_prepformal',
        //'ano_titulo',
        'titulo',
        'fecha_inicio',
        'fecha_fin',
        'pais',
        'tipo',
        'modalidad',
        'institucion_superior',
        'financiamiento',
        'monto_asignado',
        /* 'ruta', */
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
        return $this->belongsTo(GradoAcademico::class, 'id_grado_academico', 'idgradoacademico');
    }
}
