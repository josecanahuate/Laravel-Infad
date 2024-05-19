<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineaInvestigacion extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function areaInvestigacion()
    {
    return $this->belongsTo(AreaInvestigacion::class, 'linea_invetigacion_id');
    }
}
