<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TesiAsesorada extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'fecha_sustentacion',
        'pais',
        'publicacion_revista',
        'financiacion_externa',
        'ruta'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function areasInvestigacion()
    {
        return $this->belongsToMany(AreaInvestigacionTesiAsesorada::class, 'area_investigaciones_tesis_asesoradas', 'id_tesis_asesorada', 'id_area_investigacion');
    }

    public function estatus()
    {
        return $this->belongsTo(Estatus::class, 'idestatus');
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

    public function unidadFacultad()
    {
        return $this->belongsTo(UnidadFacultad::class, 'id_unidad_facultad');
    }

    public function gradoAcademico()
    {
        return $this->belongsTo(GradoAcademico::class, 'id_grado_academico');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'idcategoria');
    }

    public function enfasisActualizacion()
    {
        return $this->belongsTo(EnfasisActualizacion::class, 'idenfasis');
    }

    public function facultadEjecutora()
    {
        return $this->belongsTo(FacultadEjecutora::class, 'idfacultadej');
    }

    public function tesisAsesoradas()
    {
        return $this->hasMany(TesiAsesorada::class, 'id_unidad_facultad');
    }
}
