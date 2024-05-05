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
        Schema::create('experiencia_laboral', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('empresa');
            $table->string('cargo');
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            $table->string('pais')->nullable();
            /* $table->enum('estatus', ['pendiente', 'aprobado', 'rechazado'])->default('pendiente'); */
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiencia_laboral');
    }
};
