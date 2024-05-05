<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaInvestigacionProyectoInscrito extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombareainvest',
        'descripcion'
    ];

    public function proyectosInscritos()
    {
        return $this->belongsToMany(ProyectoInscrito::class, 'proyecto_inscrito_area_investigacion', 'id_area_investigacion', 'id_proyecto_inscrito');
    }
}
