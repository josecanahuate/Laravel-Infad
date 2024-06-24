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
        Schema::create('proyectos_inscritos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('titulo_investigacion');
            $table->enum('sector_pertenece', [
                'Tecnología',
                'Salud',
                'Educación',
                'Finanzas',
                'Manufactura',
                'Comercio minorista',
                'Agricultura',
                'Construcción',
                'Energía',
                'Medios de comunicación',
                'Servicios profesionales',
                'Bienes raíces',
                'Transporte',
                'Hotelería y turismo',
                'Entretenimiento',
                'Consultoría',
                'ONGs y organizaciones sin fines de lucro',
                'Gobierno y sector público',
                'Investigación y desarrollo (I+D)'
            ]);
            $table->unsignedBigInteger('id_area_investigacion');
            $table->unsignedBigInteger('id_facultad');
            $table->unsignedBigInteger('id_sede'); 
            $table->unsignedBigInteger('id_programa_adscribe'); 
            $table->unsignedBigInteger('id_linea_investigacion');
            $table->date('periodo_vigencia_ini')->nullable();
            $table->date('periodo_vigencia_fin')->nullable();
            $table->enum('estado_actual', 
            [
                'En Progreso',
                'Completado',
                'Pendiente de Aprobación',
                'Aprobado'
            ]);            
            $table->string('entidad_financiera')->nullable();
            $table->integer('monto_asignado')->nullable();
            $table->string('sitio_web')->nullable()->url();
            $table->string('enlace_video')->nullable()->url();            
            //$table->string('ruta')->nullable();
            $table->timestamps();

            $table->foreign('id_area_investigacion')->references('id_areainv')->on('areas_investigacion');
            $table->foreign('id_facultad')->references('idfacultad')->on('facultades'); // facultades
            $table->foreign('id_sede')->references('idsede')->on('sedes'); // sedes
            $table->foreign('id_programa_adscribe')->references('idadscribe')->on('programa_adscribe'); // programa adscribe
            $table->foreign('id_linea_investigacion')->references('id_linea')->on('lineas_investigacion'); // linea investigacion
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectos_inscritos');
    }
};
