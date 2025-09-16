<?php

namespace Database\Seeders;

use App\Models\TipoPublicacion as ModelsTipoPublicacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoPublicacion extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category1 = New ModelsTipoPublicacion();
        $category1->nombpublicacion= "ISBN";
        $category1->save();

        $category2 = New ModelsTipoPublicacion;
        $category2->nombpublicacion= "ISSN";
        $category2->save();

        $category3 = New ModelsTipoPublicacion;
        $category3->nombpublicacion= "DOI";
        $category3->save();

        $category4 = New ModelsTipoPublicacion;
        $category4->nombpublicacion= "URL";
        $category4->save();

        $category5 = New ModelsTipoPublicacion;
        $category5->nombpublicacion= "HREF";
        $category5->save();
    }
}
