<?php

namespace Database\Seeders;

use App\Models\LineaInvestigacion as ModelsLineaInvestigacion;
use App\Models\AreaInvestigacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LineaInvestigacion extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Obtener las áreas de investigación por su nombre
        $agroindustria = AreaInvestigacion::where('nombreainvest', 'Agroindustria')->first();
        $biotecnologia = AreaInvestigacion::where('nombreainvest', 'Biotecnología')->first();

        $category1 = new ModelsLineaInvestigacion();
        $category1->nombre_linea = "Innocuidad Alimentaria";
        $category1->id_area_investigacion = $agroindustria->id_areainv;
        $category1->save();

        $category2 = New ModelsLineaInvestigacion();
        $category2->nombre_linea = "Prospección de Agroindustria";
        $category2->id_area_investigacion = $agroindustria->id_areainv;
        $category2->save();

        $category3 = New ModelsLineaInvestigacion();
        $category3->nombre_linea = "Procesamiento y Análisis Alimentario";
        $category3->id_area_investigacion = $agroindustria->id_areainv;
        $category3->save();

        $category4 = New ModelsLineaInvestigacion();
        $category4->nombre_linea = "Tecnología Agroindustrial";
        $category4->id_area_investigacion = $agroindustria->id_areainv;
        $category4->save();

        $category5 = New ModelsLineaInvestigacion();
        $category5->nombre_linea = "Aprovechamiento de Residuos Agroindustriales";
        $category5->id_area_investigacion = $agroindustria->id_areainv;
        $category5->save();

        $category6 = New ModelsLineaInvestigacion();
        $category6->nombre_linea = "Tecnología de los Alimentos";
        $category6->id_area_investigacion = $agroindustria->id_areainv;
        $category6->save();

        $category7 = new ModelsLineaInvestigacion();
        $category7->nombre_linea = "Bioinformática";
        $category7->id_area_investigacion = $biotecnologia->id_areainv;
        $category7->save();

}
}