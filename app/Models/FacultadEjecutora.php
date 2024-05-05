<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultadEjecutora extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombfacultadej'
    ];

    public function tesisAsesoradas()
    {
        return $this->hasMany(TesiAsesorada::class, 'idfacultadej');
    }

    public function facultad()
    {
        return $this->belongsTo(Facultades::class, 'idfacultad');
    }


}
