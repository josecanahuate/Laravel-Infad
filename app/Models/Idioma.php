<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    use HasFactory;

    protected $table = 'idiomas';

    protected $fillable = [
        'user_id',
        'institucion',
        'idioma',
        'lee_nivel',
        'escribe_nivel',
        'habla_nivel',
        'comprende_nivel'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function archivos()
    {
        return $this->hasMany(Archivo::class, 'idioma_id');
    }
}
