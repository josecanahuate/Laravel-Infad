<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeminarioDictado extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'fecha_ini',
        'fecha_fin',
        'pais',
        'lugar',
        'horas',
        'tp_participacion',
        'ruta'
    ];
    
    public function user()
    {
    return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function programaAdscribe()
    {
    return $this->belongsTo(ProgramaAdscribe::class, 'id_programa_adscribe');
    }

    public function sedeEjecutora()
    {
    return $this->belongsTo(SedeEjecutora::class, 'id_sede_ejecutora');
    }

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'id_sede');
    }

    public function tipoParticipacion()
    {
        return $this->morphToMany(TipoParticipacion::class, 'id_tipo_participacion');
    }
}