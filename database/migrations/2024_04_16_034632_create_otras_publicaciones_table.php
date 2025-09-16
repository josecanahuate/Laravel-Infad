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
        Schema::create('otras_publicaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->unsignedBigInteger('id_publicacion');
            $table->string('titulo', 255);
            $table->date('fecha');
            $table->string('isbn', 25);
            $table->string('editorial');
            $table->string('entidad_financiera')->nullable();
            //$table->string('ruta', 255);
            $table->timestamps();
            $table->foreign('id_publicacion')->references('idpublicacion')->on('tp_publicacion');
        });
    }

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('otras_publicaciones');
    }
};
