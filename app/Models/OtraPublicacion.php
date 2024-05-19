<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtraPublicacion extends Model
{
    use HasFactory;

    protected $table = 'otras_publicaciones';

    protected $fillable = [
        'titulo',
        'fecha',
        'isbn',
        'editorial',
        /* 'ruta', */
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function tpPublicacion()
    {
        return $this->belongsTo(TipoPublicacion::class, 'id_publicacion');
    }

}
