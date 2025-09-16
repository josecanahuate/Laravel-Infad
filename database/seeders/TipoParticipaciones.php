<?php

namespace Database\Seeders;

use App\Models\TipoParticipacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoParticipaciones extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category1 = New TipoParticipacion();
        $category1->nombparticipaciones= "Presentador Principal";
        $category1->save();

        $category2 = New TipoParticipacion();
        $category2->nombparticipaciones= "Asistente";
        $category2->save();

        $category3 = New TipoParticipacion();
        $category3->nombparticipaciones= "Coordinador";
        $category3->save();

        $category4 = New TipoParticipacion();
        $category4->nombparticipaciones= "Organizador";
        $category4->save();

        $category5 = New TipoParticipacion();
        $category5->nombparticipaciones= "Evaluador";
        $category5->save();
    }
}
