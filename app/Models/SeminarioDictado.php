<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeminarioDictado extends Model
{
    use HasFactory;

    protected $table = 'seminarios_dictados';

    protected $fillable = [
        'id_tipo_participacion',
        'institucion',
        'titulo',
        'facilitador',
        'fecha_ini',
        'fecha_fin',
        'modalidad',
        'pais',
        'lugar',
        'horas',
        'tp_participacion',
        'ruta'
    ];
    
    public function user()
    {
    return $this->belongsTo(User::class, 'user_id');
    }

    public function programaAdscribe()
    {
    return $this->belongsTo(ProgramaAdscribe::class, 'id_programa_adscribe');
    }

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'id_sede');
    }

    public function tipoParticipaciones()
    {
        return $this->belongsTo(TipoParticipacion::class, 'id_tipo_participacion', 'idparticipaciones');
    }
}
