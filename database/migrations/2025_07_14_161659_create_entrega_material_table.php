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
        Schema::create('entrega_material', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_solicitud');
            $table->unsignedBigInteger('id_usuario_responsable');
            $table->date('fecha_entrega');
            $table->text('observaciones')->nullable();
            $table->unsignedBigInteger('id_ficha_formacion');

            // Claves foráneas
            $table->foreign('id_solicitud')->references('id')->on('solicitudes')->cascadeOnDelete();
            $table->foreign('id_usuario_responsable')->references('id')->on('usuarios')->cascadeOnDelete();
            $table->foreign('id_ficha_formacion')->references('id')->on('fichas_formacion')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Revierte la migración.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrega_material');
    }
};
