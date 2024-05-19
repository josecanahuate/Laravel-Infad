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
            $table->unsignedBigInteger('id_area_investigacion');
            $table->unsignedBigInteger('id_facultad');
            $table->unsignedBigInteger('id_grado_academico');
            $table->string('titulo')->nullable();
            $table->date('fecha_sustentacion');
            $table->string('pais');
            $table->enum('publicacion_revista', ['No', 'Si']);
            $table->enum('financiacion_externa', ['No', 'Si']);
            //$table->string('ruta');
            $table->timestamps();

            $table->foreign('id_area_investigacion')->references('id_areainv')->on('areas_investigacion');  //area investigacion
            $table->foreign('id_facultad')->references('idfacultad')->on('facultades'); // facultades
            $table->foreign('id_grado_academico')->references('idgradoacademico')->on('grado_academico'); // grado academico
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
