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
        Schema::create('fichas_formacion', function (Blueprint $table) {
            $table->id(); 
            $table->string('nombre', 100);
            $table->unsignedBigInteger('id_titulado');
            $table->unsignedBigInteger('id_usuario_responsable')->nullable();
            $table->timestamps(); 

            $table->foreign('id_titulado')
                ->references('id')
                ->on('titulados')
                ->cascadeOnDelete();

            $table->foreign('id_usuario_responsable')
                ->references('id')
                ->on('usuarios')
                ->nullOnDelete();
        });
    }

    /**
     * Revierte la migración.
     */
    public function down(): void
    {
        Schema::dropIfExists('fichas_formacion');
    }
};
