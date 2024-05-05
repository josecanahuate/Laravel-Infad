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
            //$table->foreignId('user_id')->constrained()->onDelete('cascade');
            //$table->foreignId('id_enfasis_actualizacion')->constrained('enfasis_actualizacion')->onDelete('cascade');
            $table->string('titulo', 120);
            $table->string('centro_estudio', 120);
            $table->string('modalidad', 120);
            $table->string('pais', 120)->nullable();
            $table->date('fecha');
            $table->string('duracion', 120);
            $table->string('ruta', 250)->nullable();;
            $table->timestamps();
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
