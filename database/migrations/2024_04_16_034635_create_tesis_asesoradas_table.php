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
        Schema::create('tesis_asesoradas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('titulo')->nullable();
            $table->date('fecha_sustentacion')->nullable();
            //$table->foreignId('id_area_investigacion')->constrained('area_investigaciones_tesis_asesoradas')->onDelete('cascade');
            //$table->foreignId('id_unidad_facultad')->constrained('unidad_facultad')->onDelete('cascade');
            //$table->foreignId('id_grado_academico')->constrained('grado_academico')->onDelete('cascade');
            $table->string('pais');
            $table->enum('publicacion_revista', ['No', 'Si']);
            $table->enum('financiacion_externa', ['No', 'Si']);
            //$table->string('ruta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tesis_asesoradas');
    }
};
