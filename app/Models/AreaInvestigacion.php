<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaInvestigacion extends Model
{
    use HasFactory;

    protected $table = 'areas_investigacion';
    protected $fillable = ['nombreainvest'];

    public function lineasInvestigacion()
    {
        return $this->hasMany(LineaInvestigacion::class, 'areas_investigacion');
    }

    //datos personales
    public function datosPersonales()
    {
    return $this->hasMany(DatoPersonal::class, 'id_area_investigacion');
    }

    //tesis asesoradas
    public function tesisAsesoradas()
    {
    return $this->belongsToMany(TesiAsesorada::class, 'areas_investigacion', 'id_area_investigacion', 'id_tesis_asesorada');
    }

    //proyectos inscritos
    public function proyectosInscritos()
    {
    return $this->belongsToMany(ProyectoInscrito::class, 'areas_investigacion', 'id_area_investigacion', 'id_proyecto_inscrito');
    }

}
