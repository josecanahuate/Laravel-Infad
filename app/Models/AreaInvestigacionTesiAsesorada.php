<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaInvestigacionTesiAsesorada extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombareainv'
    ];

    public function tesisAsesoradas()
{
    return $this->belongsToMany(TesiAsesorada::class, 'area_investigaciones_tesis_asesoradas', 'id_area_investigacion', 'id_tesis_asesorada');
}

}
