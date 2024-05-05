<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradoAcademicoPreparacionFormal extends Model
{
    use HasFactory;

    protected $table = 'grados_academicos_preparacion_formal';
    //protected $primaryKey = 'idgradosacad';
    protected $fillable = [
        'nombgradosacad',
        'descripcion',
    ];

      public function seminariosDictados()
    {
        return $this->hasMany(SeminarioDictado::class, 'id_programa_adscribe');
    }
}
