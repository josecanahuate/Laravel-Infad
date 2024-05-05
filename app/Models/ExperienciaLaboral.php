<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienciaLaboral extends Model
{
    use HasFactory;

    protected $table = 'experiencia_laboral';

    protected $fillable = [
        'empresa',
        'cargo',
        'fecha_inicio',
        'fecha_fin',
        'pais',
    ];
    

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
