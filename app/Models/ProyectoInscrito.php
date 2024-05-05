<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectoInscrito extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo_investigacion',
        'sector_pertenece',
        'linea_investigacion',
        'periodo_vigencia',
        'estado_actual',
        'entidad_financiera',
        'monto_asignado',
        'sitio_web',
        'enlace_video',
        'ruta',
    ];
    
    
    public function areasInvestigacion()
    {
        return $this->belongsToMany(AreaInvestigacionProyectoInscrito::class, 'proyecto_inscrito_area_investigacion', 'id_proyecto_inscrito', 'id_area_investigacion');
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'proyecto_inscrito_categoria', 'id_proyecto_inscrito', 'id_categoria');
    }

    public function facultadEjecutora()
    {
        return $this->belongsTo(FacultadEjecutora::class, 'idfacultadej');
    }

    public function programaAdscribe()
    {
        return $this->belongsTo(ProgramaAdscribe::class, 'id_programa_adscribe');
    }
    
    public function sedeEjecutora()
    {
        return $this->belongsTo(SedeEjecutora::class, 'id_sede_ejecutora');
    }
    
    public function user()
    {
    return $this->belongsTo(User::class, 'user_id');
    }

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'id_sede');
    }

    public function enfasisActualizacion()
    {
        return $this->belongsTo(EnfasisActualizacion::class, 'idenfasis');
    }

    public function estatus()
    {
        return $this->belongsTo(Estatus::class, 'idestatus');
    }

    public function gradoAcademico()
    {
        return $this->belongsTo(GradoAcademico::class, 'id_grado_academico');
    }

    public function tipoParticipacion()
    {
        return $this->morphToMany(TipoParticipacion::class, 'id_tipo_participacion');
    }

}
