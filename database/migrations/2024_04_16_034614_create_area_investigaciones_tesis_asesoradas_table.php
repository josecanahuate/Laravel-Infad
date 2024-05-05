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
        Schema::create('area_investigaciones_tesis_asesoradas', function (Blueprint $table) {
            $table->id('idareainv');
            $table->string('nombareainv', 50);
            $table->timestamps();
        });
    
        /*
        Schema::table('area_investigaciones_tesis_asesoradas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_tesis_asesorada');
            $table->unsignedBigInteger('id_area_investigacion');
            
            // Definición de llaves foráneas
            $table->foreign('id_tesis_asesorada')->references('id')->on('tesis_asesoradas')->onDelete('cascade');
            $table->foreign('id_area_investigacion')->references('idareainv')->on('area_investigaciones_tesis_asesoradas')->onDelete('cascade');
        });
        */
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('area_investigaciones_tesis_asesoradas');
    }
};
