<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'idioma_id', 'nombre_archivo', 'tipo_archivo', 'ruta'
    ];

    public function idioma()
    {
        return $this->belongsTo(Idioma::class, 'idioma_id');
    }
}
