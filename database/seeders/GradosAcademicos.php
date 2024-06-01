<?php

namespace Database\Seeders;

use App\Models\GradoAcademico;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradosAcademicos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category1 = New GradoAcademico();
        $category1->nombgradoacademico= "Maestría";
        $category1->save();

        $category2 = New GradoAcademico();
        $category2->nombgradoacademico= "Licenciatura";
        $category2->save();

        $category3 = New GradoAcademico();
        $category3->nombgradoacademico= "Doctorado";
        $category3->save();

        $category4 = New GradoAcademico();
        $category4->nombgradoacademico= "Post Doctorado";
        $category4->save();

        $category5 = New GradoAcademico();
        $category5->nombgradoacademico= "Especialización";
        $category5->save();

        $category6 = New GradoAcademico();
        $category6->nombgradoacademico= "Técnico";
        $category6->save();
    }
}
