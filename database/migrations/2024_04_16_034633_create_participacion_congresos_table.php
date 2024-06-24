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
            $table->unsignedBigInteger('id_tipo_participacion');
            $table->string('titulo', 150);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('lugar_congreso', 180);
            $table->string('pais', 120)->nullable();
            $table->enum('publicacion_proceeding', ['Presentado y Aceptado', 'Presentado pero no Aceptado', 'No Presentado', 'Provisional']);
            //$table->string('ruta', 200);
            $table->timestamps();

            $table->foreign('id_tipo_participacion')->references('idparticipaciones')->on('tipo_participaciones')->onDelete('cascade');
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
