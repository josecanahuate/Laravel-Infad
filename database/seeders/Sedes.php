<?php

namespace Database\Seeders;

use App\Models\Sede;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Sedes extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category1 = New Sede();
        $category1->nombsede= "Panamá";
        $category1->save();

        $category2 = New Sede();
        $category2->nombsede= "Panamá Oeste";
        $category2->save();

        $category3 = New Sede();
        $category3->nombsede= "Colón";
        $category3->save();

        $category4 = New Sede();
        $category4->nombsede= "Coclé";
        $category4->save();

        $category5 = New Sede();
        $category5->nombsede= "Los Santos";
        $category5->save();

        $category6 = New Sede();
        $category6->nombsede= "Veraguas";
        $category6->save();

        $category7 = New Sede();
        $category7->nombsede= "Chiriquí";
        $category7->save();

        $category8 = New Sede();
        $category8->nombsede= "Bocas del Toro";
        $category8->save();

        $category9 = New Sede();
        $category9->nombsede= "Tocumen";
        $category9->save();

        $category10 = New Sede();
        $category10->nombsede= "Howard";
        $category10->save();

        $category11 = New Sede();
        $category11->nombsede= "Azuero";
        $category11->save();
    }
}
