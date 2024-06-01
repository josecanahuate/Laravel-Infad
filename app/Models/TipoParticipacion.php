<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoParticipacion extends Model
{
    use HasFactory;

    protected $primaryKey = 'idparticipaciones';
    protected $table = 'tipo_participaciones';

    //relaciones
    public function participaciones()
    {
        return $this->hasMany(ParticipacionCongreso::class, 'id_tipo_participacion');
    }

}
