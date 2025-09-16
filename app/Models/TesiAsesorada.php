<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TesiAsesorada extends Model
{
    use HasFactory;

    protected $table = 'tesis_asesoradas';
    protected $fillable = [
        'id_area_investigacion',
        'id_grado_academico',
        'id_facultad',
        'titulo',
        'fecha_sustentacion',
        'pais',
        'publicacion_revista',
        'financiacion_externa',
        /* 'ruta' */
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function estatus()
    {
        return $this->belongsTo(Estatus::class, 'idestatus');
    }

    
    public function areaInvestigacion()
    {
        return $this->belongsTo(AreaInvestigacion::class, 'id_area_investigacion', 'id_areainv');
    }

    public function gradoAcademico()
    {
        return $this->belongsTo(GradoAcademico::class, 'id_grado_academico', 'idgradoacademico');
    }

    public function facultad()
    {
    return $this->belongsTo(Facultades::class, 'id_facultad', 'idfacultad');
    }


    


    public function programaAdscribe()
    {
        return $this->belongsTo(ProgramaAdscribe::class, 'id_programa_adscribe');
    }

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'id_sede');
    }


    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'idcategoria');
    }

    public function enfasisActualizacion()
    {
        return $this->belongsTo(EnfasisActualizacion::class, 'idenfasis');
    }

}

