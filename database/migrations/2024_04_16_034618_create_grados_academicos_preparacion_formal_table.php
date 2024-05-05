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
        Schema::create('grados_academicos_preparacion_formal', function (Blueprint $table) {
            $table->id('idgradosacad');
            $table->string('nombgradosacad', 100);
            $table->string('descripcion', 100)->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grados_academicos_preparacion_formal');
    }
};
