<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('datos_personales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('cedula', 12)->unique();
            $table->string('nombres', 50);
            $table->string('apellidos', 50);
            $table->date('fecha_nacimiento');
            $table->enum('genero', ['masculino', 'femenino']);
            $table->string('estado_civil');
            $table->string('nacionalidad');
            $table->string('dir_postal')->nullable();
            $table->string('correo_inst')->unique();
            $table->string('tel_oficina')->nullable();
            $table->string('tel_residencia')->nullable();
            $table->string('email')->unique();
            $table->string('tel_celular')->nullable();
            $table->string('nivel_academico');
            $table->unsignedBigInteger('id_sede');
            $table->unsignedBigInteger('id_facultad');
            $table->unsignedBigInteger('id_categoria');
            $table->unsignedBigInteger('id_area_investigacion');
            $table->string('cargo');
            $table->unsignedBigInteger('id_funcion_principal');
            $table->string('area_interes');
            $table->string('imgprofile');
            $table->timestamps();

            $table->foreign('id_sede')->references('idsede')->on('sedes'); // sedes
            $table->foreign('id_facultad')->references('idfacultad')->on('facultades');
            $table->foreign('id_categoria')->references('idcategoria')->on('categorias');
            $table->foreign('id_area_investigacion')->references('id_areainv')->on('areas_investigacion');
            $table->foreign('id_funcion_principal')->references('idfuncionprincipal')->on('funcion_principal');  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_personales');
    }
};
