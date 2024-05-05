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
            $table->enum('idioma', ['Español', 'Inglés', 'Chino', 'Francés', 'Alemán', 'Italiano', 'Portugués', 'Japonés', 'Coreano', 'Ruso', 'Árabe']);
            $table->enum('lee_nivel', ['Basico', 'Intermedio', 'Avanzado']);
            $table->enum('escribe_nivel', ['Basico', 'Intermedio', 'Avanzado']);
            $table->enum('habla_nivel', ['Basico', 'Intermedio', 'Avanzado']);
            $table->enum('comprende_nivel', ['Basico', 'Intermedio', 'Avanzado']);
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
