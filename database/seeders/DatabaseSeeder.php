<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ProgramaAdscribe;
use Database\Seeders\ProgramaAdscribe as SeedersProgramaAdscribe;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            AreaInvestigacion::class,
            EnfasisActualizacion::class,
            Facultades::class,
            GradosAcademicos::class,
            LineaInvestigacion::class,
            Sedes::class,
            TipoParticipaciones::class,
            TipoPublicacion::class,
            SeedersProgramaAdscribe::class,
        ]);

    }
}
