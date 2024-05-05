<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facultades extends Model
{
    use HasFactory;

    protected $table = 'facultades';

    protected $fillable = [
        'nombfacultad',
        'descripcion'
    ];

     public function programasAdscribe()
    {
        return $this->hasMany(ProgramaAdscribe::class, 'id_facultad');
    } 

    public function datosPersonales()
    {
        return $this->hasMany(DatoPersonal::class, 'id_facultad');
    }

    public function facultadesEjecutoras()
    {
        return $this->hasMany(FacultadEjecutora::class, 'idfacultad');
    }


}
