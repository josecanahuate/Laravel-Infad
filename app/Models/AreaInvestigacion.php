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
        return $this->hasMany(LineaInvestigacion::class, 'id_area_investigacion', 'id_areainv');
    }

    //datos personales
    public function datosPersonales()
    {
    return $this->hasMany(DatoPersonal::class, 'id_area_investigacion', 'id_areainv');
    }

    //tesis asesoradas
/*     public function tesisAsesoradas()
    {
    return $this->belongsToMany(TesiAsesorada::class, 'id_area_investigacion', 'id_areainv', 'id_grado_academico', 'idgradoacademico', 'id_facultad', 'idfacultad');
    }
 */
    public function tesisAsesoradas()
    {
    return $this->hasMany(TesiAsesorada::class, 'id_area_investigacion', 'id_areainv');
    }

    //proyectos inscritos
    public function proyectosInscritos()
    {
    return $this->hasMany(ProyectoInscrito::class, 'id_area_investigacion', 'id_areainv');
    }

}
