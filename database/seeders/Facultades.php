<?php

namespace Database\Seeders;

use App\Models\Facultades as ModelsFacultades;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Facultades extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category1 = New ModelsFacultades();
        $category1->nombfacultad= "Facultad de Ciencias y Tecnología";
        $category1->descripcion= "Ciencias y Tecnología";
        $category1->save();

        $category2 = New ModelsFacultades();
        $category2->nombfacultad= "Facultad de Ingeniería Civil";
        $category2->descripcion= "Ingeniería Civil";
        $category2->save();

        $category3 = New ModelsFacultades();
        $category3->nombfacultad= "Facultad de Ingeniería Eléctrica";
        $category3->descripcion= "Ingeniería Eléctrica";
        $category3->save();

        $category4 = New ModelsFacultades();
        $category4->nombfacultad= "Facultad de Ingeniería Industrial";
        $category4->descripcion= "Ingeniería Industrial";
        $category4->save();

        $category5 = New ModelsFacultades();
        $category5->nombfacultad= "Facultad de Ingeniería Mecánica";
        $category5->descripcion= "Ingeniería Mecánica";
        $category5->save();

        $category6 = New ModelsFacultades();
        $category6->nombfacultad= "Facultad de Ingeniería de Sistemas Computacionales";
        $category6->descripcion= "Sistemas Computacionales";
        $category6->save();
    }
}
