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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('titulo', 150)->nullable();
            $table->date('fecha_inicio', 15);
            $table->date('fecha_fin', 15);
            $table->string('lugar_congreso', 180)->nullable();
            $table->string('pais', 120)->nullable();
            $table->enum('publicacion_proceeding', ['Presentado y Aceptado', 'Presentado pero no Aceptado', 'No Presentado', 'Provisional']);
            $table->enum('tipo_participaciones', ['Presentador Principal', 'Asistente', 'Coordinador', 'Organizador', 'Evaluador']);
            //$table->string('ruta', 200);
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
