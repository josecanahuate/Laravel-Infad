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
        Schema::create('preparacion_constante', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('id_enfasis_actualizacion');
            $table->string('titulo', 120);
            $table->string('centro_estudio', 120);
            $table->enum('modalidad', ['Presencial', 'Virtual', 'Semi-presencial']);
            $table->string('pais', 120);
            $table->enum('estatus_prepconstante', ['Cursando Actualmente', 'Completo']);
            $table->string('ano_titulo', 120);
            $table->integer('duracion');
            //$table->string('ruta', 250)->nullable();;
            $table->timestamps();
            $table->foreign('id_enfasis_actualizacion')->references('idenfasis')->on('enfasis_actualizacion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preparacion_constante');
    }
};
