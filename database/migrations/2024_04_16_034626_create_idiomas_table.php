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
        Schema::create('idiomas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('institucion')->nullable();
            $table->string('idioma');
            $table->string('lee_nivel'); // Puede ser básico, intermedio, avanzado, etc.
            $table->string('escribe_nivel'); // Puede ser básico, intermedio, avanzado, etc.
            $table->string('habla_nivel'); // Puede ser básico, intermedio, avanzado, etc.
            $table->string('comprende_nivel'); // Puede ser básico, intermedio, avanzado, etc.
            $table->string('ruta')->nullable(); // ruta img diploma
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('idiomas');
    }
};
