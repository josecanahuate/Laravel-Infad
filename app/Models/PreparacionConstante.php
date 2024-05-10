<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreparacionConstante extends Model
{
    use HasFactory;

    protected $table = 'preparacion_constante';
    protected $fillable = [
        'titulo',
        'centro_estudio',
        'modalidad',
        'pais',
        'duracion',
        'ano_titulo',
        'estatus_prepconstante'
       /*  'ruta', */
    ];
    
    public function user()
    {
    return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function enfasisActualizacion()
    {
        return $this->belongsTo(EnfasisActualizacion::class, 'id_enfasis_actualizacion');
    }
}
