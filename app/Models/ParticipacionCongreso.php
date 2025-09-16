<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipacionCongreso extends Model
{
    use HasFactory;

    protected $table = 'participacion_congresos';
    protected $fillable = [
        'id_tipo_participacion',
        'titulo',
        'fecha_inicio',
        'fecha_fin',
        'lugar_congreso',
        'pais',
        'publicacion_proceeding',
        /* 'ruta' */
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function programaAdscribe()
    {
        return $this->belongsTo(ProgramaAdscribe::class, 'id_programa_adscribe');
    }

    public function tipoParticipaciones()
    {
        return $this->belongsTo(TipoParticipacion::class, 'id_tipo_participacion', 'idparticipaciones');
    }
}

