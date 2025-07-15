<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta la migración.
     */
    public function up(): void
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id(); 

            $table->unsignedBigInteger('id_usuario_solicitante'); 
            $table->date('fecha_solicitud');
            $table->string('estado_solicitud', 50);

         
            $table->foreign('id_usuario_solicitante')->references('id')->on('usuarios')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Revierte la migración.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitudes');
    }
};
