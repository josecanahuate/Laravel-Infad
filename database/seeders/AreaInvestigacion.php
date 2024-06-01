<?php

namespace Database\Seeders;

use App\Models\AreaInvestigacion as ModelsAreaInvestigacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaInvestigacion extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category1 = New ModelsAreaInvestigacion();
        $category1->nombreainvest= "Agroindustria";
        $category1->save();

        $category2 = New ModelsAreaInvestigacion();
        $category2->nombreainvest= "Biotecnología";
        $category2->save();


        $category3 = New ModelsAreaInvestigacion();
        $category3->nombreainvest= "Energía y Ambiente";
        $category3->save();

        $category4 = New ModelsAreaInvestigacion();
        $category4->nombreainvest= "Infraestructura";
        $category4->save();

        $category5 = New ModelsAreaInvestigacion();
        $category5->nombreainvest= "Logística y Transporte";
        $category5->save();

        $category6 = New ModelsAreaInvestigacion();
        $category6->nombreainvest= "Robótica, Automatización e Inteligencia Artificial";
        $category6->save();

        $category7 = New ModelsAreaInvestigacion();
        $category7->nombreainvest= "Procesos Manufactura y Ciencia de los Materiales";
        $category7->save();

        $category8 = New ModelsAreaInvestigacion();
        $category8->nombreainvest= "Tecnologías de la Información y Comunicaciones";
        $category8->save();

        $category9 = New ModelsAreaInvestigacion();
        $category9->nombreainvest= "Astronomía (Astrofísica)";
        $category9->save();

        $category10 = New ModelsAreaInvestigacion();
        $category10->nombreainvest= "Educación en Ingeniería";
        $category10->save();

        $category11 = New ModelsAreaInvestigacion();
        $category11->nombreainvest= "Gestión Empresarial, Emprendimiento e Innovación";
        $category11->save();
    }
}
