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
            $table->id('id_linea');
            $table->string('nombre_linea', 255);
            $table->unsignedBigInteger('id_area_investigacion');
            $table->foreign('id_area_investigacion')->references('id_areainv')->on('areas_investigacion'); // sedes
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
