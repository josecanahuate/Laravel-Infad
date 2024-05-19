<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    use HasFactory;

    protected $table = 'idiomas';

    protected $fillable = [
        'institucion',
        'idioma',
        'lee_nivel',
        'escribe_nivel',
        'habla_nivel',
        'comprende_nivel',
        'ruta'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
