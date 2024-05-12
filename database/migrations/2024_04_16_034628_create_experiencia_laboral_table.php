<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('experiencia_laboral', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('empresa');
            $table->string('cargo');
            $table->enum('estatus_empleo', ['Terminado', 'Actualmente laborando']);
            $table->enum('sector_empresa', [
                'Tecnología',
                'Salud',
                'Educación',
                'Finanzas',
                'Manufactura',
                'Comercio minorista',
                'Agricultura',
                'Construcción',
                'Energía',
                'Medios de comunicación',
                'Servicios profesionales',
                'Bienes raíces',
                'Transporte',
                'Hotelería y turismo',
                'Entretenimiento',
                'Consultoría',
                'ONGs y organizaciones sin fines de lucro',
                'Gobierno y sector público',
                'Investigación y desarrollo (I+D)',
                'Otros (especificar)'
            ]);
            
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            $table->string('pais')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiencia_laboral');
    }
};
