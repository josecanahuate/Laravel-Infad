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
        Schema::create('preparacion_formal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); //si esta en ondelete se elimina todo lo referente a ese usuario            
            $table->unsignedBigInteger('id_grado_academico');
            $table->foreign('id_grado_academico')->references('idgradoacademico')->on('grado_academico')->onDelete('cascade');
            //$table->enum('estatus_prepformal', ['Cursando Actualmente', 'Completo']);
            $table->string('titulo', 120);
            //$table->string('ano_titulo', 120)->nullable();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('pais', 120)->nullable();
            $table->enum('tipo', ['Nacional', 'Extranjero']);
            $table->enum('modalidad', ['Presencial', 'Virtual', 'Semi-presencial']);
            $table->string('institucion_superior', 120);
            $table->enum('financiamiento', ['Recursos Propios', 'Beca', 'Financiamiento']);
            $table->integer('monto_asignado')->nullable();
            $table->string('ruta', 150)->nullable();
            /* $table->enum('estatus', ['pendiente', 'aprobado', 'rechazado'])->default('pendiente'); */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preparacion_formal');
    }
};