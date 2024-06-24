<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineaInvestigacion extends Model
{
    use HasFactory;

    protected $table = 'lineas_investigacion';
    //protected $fillable = ['nombre_linea'];
    protected $fillable = ['nombre_linea', 'id_area_investigacion'];
    
    //proyectos inscritos
    public function proyectosInscritos()
    {
    return $this->hasMany(ProyectoInscrito::class, 'id_linea_investigacion', 'id_linea');
    }

    public function areaInvestigacion()
    {
        return $this->belongsTo(AreaInvestigacion::class, 'id_area_investigacion', 'id_areainv');
    }
}
