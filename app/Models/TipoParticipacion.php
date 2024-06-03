<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoParticipacion extends Model
{
    use HasFactory;

    protected $table = 'tipo_participaciones';

    protected $fillable = [
        'nombparticipaciones',
    ];
    
    public function participacionesCongresos()
    {
        return $this->hasMany(ParticipacionCongreso::class, 'id_tipo_participacion', 'idparticipaciones');
    }

    public function seminariosDictados()
    {
        return $this->hasMany(SeminarioDictado::class, 'id_tipo_participacion', 'idparticipaciones');
    }
}
