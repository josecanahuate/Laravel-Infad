<?php

namespace Database\Seeders;

use App\Models\EnfasisActualizacion as ModelsEnfasisActualizacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnfasisActualizacion extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category1 = New ModelsEnfasisActualizacion();
        $category1->nombrenfasis= "Diplomado";
        $category1->save();

        $category2 = New ModelsEnfasisActualizacion();
        $category2->nombrenfasis= "Curso";
        $category2->save();


        $category3 = New ModelsEnfasisActualizacion();
        $category3->nombrenfasis= "Pasantía";
        $category3->save();

        $category4 = New ModelsEnfasisActualizacion();
        $category4->nombrenfasis= "Seminarios";
        $category4->save();

        $category5 = New ModelsEnfasisActualizacion();
        $category5->nombrenfasis= "Logística y Transporte";
        $category5->save();

        $category6 = New ModelsEnfasisActualizacion();
        $category6->nombrenfasis= "Talleres";
        $category6->save();
    }
}
