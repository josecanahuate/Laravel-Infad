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
            //$table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            //$table->foreignId('id_institucion')->nullable()->constrained('instituciones')->onDelete('set null');
            $table->string('titulo')->nullable();
            //$table->foreignId('id_facilitador')->nullable()->constrained('facilitadores')->onDelete('set null');
            $table->date('fecha_ini')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->string('pais')->nullable();
            //$table->foreignId('id_modalidad')->nullable()->constrained('modalidades')->onDelete('set null');
            $table->string('lugar')->nullable();
            $table->string('horas')->nullable();
            $table->string('tp_participacion')->nullable();
            $table->string('ruta');
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
