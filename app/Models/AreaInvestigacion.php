<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaInvestigacion extends Model
{
    use HasFactory;

    protected $table = 'areas_investigacion';
    protected $fillable = ['nombreainvest'];



    //datos personales
    public function datosPersonales()
    {
    return $this->hasMany(DatoPersonal::class, 'id_area_investigacion', 'id_areainv');
    }

    public function tesisAsesoradas()
    {
    return $this->hasMany(TesiAsesorada::class, 'id_area_investigacion', 'id_areainv');
    }

    //proyectos inscritos
    public function proyectosInscritos()
    {
    return $this->hasMany(ProyectoInscrito::class, 'id_area_investigacion', 'id_areainv');
    }

    public function lineasInvestigacion()
    {
        return $this->hasMany(LineaInvestigacion::class, 'id_area_investigacion', 'id_areainv');
    }

}
