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
        Schema::create('seminarios_dictados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            /* $table->unsignedBigInteger('id_enfasis_actualizacion'); */
            $table->unsignedBigInteger('id_tipo_participacion');
            $table->string('institucion');
            $table->string('titulo');
            $table->string('facilitador')->nullable();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('pais');
            $table->enum('modalidad', ['Presencial', 'Virtual', 'Semi-presencial']);
            $table->string('lugar', 255);
            $table->integer('horas');
            /* $table->string('ruta'); */
            $table->timestamps();
            
            $table->foreign('id_tipo_participacion')->references('idparticipaciones')->on('tipo_participaciones');
            /* $table->foreign('id_enfasis_actualizacion')->references('idenfasis')->on('enfasis_actualizacion'); */
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seminarios_dictados');
    }
};
