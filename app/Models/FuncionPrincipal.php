<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuncionPrincipal extends Model
{
    use HasFactory;

    protected $table = 'funcion_principal';

    protected $fillable = [
        'nombfuncionprincipal'
    ];

    /**
     * Obtiene los usuarios que tienen esta función principal.
     */
    public function users()
    {
        return $this->hasMany(User::class, 'id_funcion_principal');
    }

    public function datosPersonales()
    {
        return $this->hasMany(DatoPersonal::class, 'id_funcion_principal');
    }

}
