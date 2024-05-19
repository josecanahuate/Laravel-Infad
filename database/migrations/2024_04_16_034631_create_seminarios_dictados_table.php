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
            $table->string('institucion');
            $table->string('titulo');
            $table->string('facilitador')->nullable();
            $table->date('fecha_ini');
            $table->date('fecha_fin');
            $table->string('pais');
            $table->enum('modalidad', ['Presencial', 'Virtual', 'Semi-presencial']);
            $table->string('lugar');
            $table->integer('horas');
            $table->enum('tipo_participacion', ['Presentador Principal', 'Asistente', 'Coordinador', 'Organizador', 'Evaluador']);
            /* $table->string('ruta'); */
            $table->timestamps();
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
