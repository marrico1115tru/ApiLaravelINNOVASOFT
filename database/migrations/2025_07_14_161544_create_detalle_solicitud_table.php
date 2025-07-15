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
        Schema::create('detalle_solicitud', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_solicitud');
            $table->unsignedBigInteger('id_producto');
            $table->integer('cantidad_solicitada');
            $table->text('observaciones')->nullable();

       
            $table->foreign('id_solicitud')->references('id')->on('solicitudes')->cascadeOnDelete();
            $table->foreign('id_producto')->references('id')->on('productos')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Revierte la migración.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_solicitud');
    }
};
