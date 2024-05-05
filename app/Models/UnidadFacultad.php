<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadFacultad extends Model
{
    use HasFactory;

    protected $primaryKey = 'idunidadfacultad';
    protected $table = 'unidad_facultad';

    public function tesisAsesoradas()
    {
    return $this->hasMany(TesiAsesorada::class, 'id_unidad_facultad', 'idunidadfacultad');
    }


}
