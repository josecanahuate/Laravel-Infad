<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipacionCongreso extends Model
{
    use HasFactory;

    protected $table = 'participacion_congresos';
    protected $fillable = [
        'titulo',
        'fecha_inicio',
        'fecha_fin',
        'lugar_congreso',
        'pais',
        'publicacion_proceeding',
        'tipo_participaciones',
        /* 'ruta' */
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function programaAdscribe()
    {
        return $this->belongsTo(ProgramaAdscribe::class, 'id_programa_adscribe');
    }
}

