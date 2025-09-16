<?php

namespace Database\Seeders;

use App\Models\ProgramaAdscribe as ModelsProgramaAdscribe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramaAdscribe extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category1 = New ModelsProgramaAdscribe();
        $category1->nombadscribe= "Programa 1";
        $category1->save();

        $category2 = New ModelsProgramaAdscribe();
        $category2->nombadscribe= "Programa 2";
        $category2->save();

        $category3 = New ModelsProgramaAdscribe();
        $category3->nombadscribe= "Programa 3";
        $category3->save();
    }
}
