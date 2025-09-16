<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPublicacion extends Model
{
    use HasFactory;
    protected $table = 'tp_publicacion';
    protected $fillable = ['nombpublicacion'];

    
    public function otrasPublicaciones()
    {
        return $this->hasMany(OtraPublicacion::class, 'id_publicacion', 'idpublicacion');
    }
}
