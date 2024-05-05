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
        Schema::create('proyectos_inscritos', function (Blueprint $table) {
            $table->id();
            ////$table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('titulo_investigacion');
            $table->string('sector_pertenece');
            //$table->foreignId('id_area_investigacion')->constrained('area_investigaciones_proyectos_inscritos')->onDelete('cascade');
            $table->string('linea_investigacion')->nullable();
            //$table->foreignId('id_programa_adscribe')->constrained('programa_adscribe')->onDelete('cascade');
            $table->string('periodo_vigencia')->nullable(); //colocar placeholder formato "2022-2023"
            $table->string('estado_actual');
            $table->string('entidad_financiera')->nullable();
            $table->string('monto_asignado')->nullable();
            //$table->foreignId('id_sede_ejecutora')->constrained('sede_ejecutora')->onDelete('cascade');
            //$table->foreignId('idfacultadej')->constrained('facultad_ejecutora')->onDelete('cascade');
            $table->string('sitio_web')->nullable()->url();
            $table->string('enlace_video')->nullable()->url();            
            $table->string('ruta')->nullable();
            //$table->foreignId('id_sede')->constrained('sedes')->onDelete('cascade'); //revisar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectos_inscritos');
    }
};