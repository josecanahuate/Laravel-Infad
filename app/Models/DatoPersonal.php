<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatoPersonal extends Model
{
    protected $table = 'datos_personales';

    use HasFactory;

     protected $fillable = [
        'cedula', 'nombres', 'apellidos', 'fecha_nacimiento', 'genero', 'estado_civil', 'nacionalidad',
        'dir_postal', 'correo_inst', 'tel_oficina', 'tel_residencia', 'email', 'tel_celular',
        'nivel_academico', 'id_sede', 'id_facultad', 'id_categoria', 'id_area_investigacion',
        'cargo', 'id_funcion_principal', 'area_interes', 'imgprofile'
    ];

    //protected $guarded = ['id', 'token'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function sede()
    {
    return $this->belongsTo(Sede::class, 'id_sede');
    }

    public function facultad()
    {
    return $this->belongsTo(Facultades::class, 'id_facultad');
    }

    public function categoria()
    {
    return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function funcionPrincipal()
    {
    return $this->belongsTo(FuncionPrincipal::class, 'id_funcion_principal');
    }

    //area investigacion
    public function areaInvestigacion()
    {
    return $this->belongsTo(AreaInvestigacion::class, 'id_area_investigacion');
    } 

}
