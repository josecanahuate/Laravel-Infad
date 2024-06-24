<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectoInscrito extends Model
{
    use HasFactory;

    protected $table = 'proyectos_inscritos';
    protected $fillable = [
        'sector_pertenece',
        'id_area_investigacion',
        'id_linea_investigacion',
        'id_programa_adscribe',
        'id_sede',
        'id_facultad',
        'titulo_investigacion',
        'periodo_vigencia_ini',
        'periodo_vigencia_fin',
        'estado_actual',
        'entidad_financiera',
        'monto_asignado',
        'sitio_web',
        'enlace_video',
        /* 'ruta', */
    ];
    

    public function user()
    {
    return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'proyecto_inscrito_categoria', 'id_proyecto_inscrito', 'id_categoria');
    }

    public function facultad()
    {
    return $this->belongsTo(Facultades::class, 'id_facultad', 'idfacultad');
    }

    public function programaAdscribe()
    {
        return $this->belongsTo(ProgramaAdscribe::class, 'id_programa_adscribe', 'idadscribe');
    }
        
    public function sede()
    {
        return $this->belongsTo(Sede::class, 'id_sede', 'idsede');
    }

    public function enfasisActualizacion()
    {
        return $this->belongsTo(EnfasisActualizacion::class, 'idenfasis', 'idenfasis');
    }

    public function estatus()
    {
        return $this->belongsTo(Estatus::class, 'idestatus');
    }

    public function gradoAcademico()
    {
        return $this->belongsTo(GradoAcademico::class, 'id_grado_academico', 'idgradoacademico');
    }

    public function areaInvestigacion()
    {
        return $this->belongsTo(AreaInvestigacion::class, 'id_area_investigacion', 'id_areainv');
    }

    public function tipoParticipaciones()
    {
        return $this->morphToMany(TipoParticipacion::class, 'id_tipo_participacion', 'idparticipaciones');
    }

}
