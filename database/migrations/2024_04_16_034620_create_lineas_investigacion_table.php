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
        Schema::create('lineas_investigacion', function (Blueprint $table) {
            $table->id('linea_inv');
            $table->unsignedBigInteger('linea_invetigacion_id');
            $table->foreign('linea_invetigacion_id')->references('id_areainv')->on('areas_investigacion'); // grado academico
            $table->string('nombre_linea');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lineas_investigacion');
    }
};
