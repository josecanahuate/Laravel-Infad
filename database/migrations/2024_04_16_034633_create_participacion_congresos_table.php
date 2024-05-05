<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('participacion_congresos', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('titulo', 150)->nullable();
            $table->string('fecha_inicio', 15)->nullable();
            $table->string('fecha_fin', 15)->nullable();
            $table->string('lugar_congreso', 180)->nullable();
            $table->string('pais', 120)->nullable();
            $table->string('publicacion_proceeding', 180)->nullable();
            //$table->foreignId('id_tipo_participacion')->constrained('tipo_participaciones')->onDelete('cascade');
            $table->string('ruta', 200);
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participacion_congresos');
    }
};
