<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombcategoria',
        'descripcion'
    ];

    public function proyectosInscritos()
    {
        return $this->belongsToMany(ProyectoInscrito::class, 'proyecto_inscrito_categoria', 'id_categoria', 'id_proyecto_inscrito');
    }

    // Categoria.php
    public function tesisAsesoradas()
    {
        return $this->hasMany(TesiAsesorada::class, 'idcategoria');
    }
}
