<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta las migraciones.
     */
    public function up(): void
    {
        Schema::create('sitio', function (Blueprint $table) {
            $table->id(); // id PK

            $table->string('nombre', 100);
            $table->string('ubicacion', 150)->nullable(); // por si no todos tienen ubicación
            $table->unsignedBigInteger('id_area');
            $table->unsignedBigInteger('id_tipo_sitio');
            $table->string('estado', 20)->default('ACTIVO'); // ACTIVO o INACTIVO

            // Relaciones FK
            $table->foreign('id_area')->references('id')->on('areas')->cascadeOnDelete();
            $table->foreign('id_tipo_sitio')->references('id')->on('tipo_sitio')->cascadeOnDelete();

            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        Schema::dropIfExists('sitio');
    }
};
