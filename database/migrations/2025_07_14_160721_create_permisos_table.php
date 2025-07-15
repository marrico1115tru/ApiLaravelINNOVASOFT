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
        Schema::create('permisos', function (Blueprint $table) {
            $table->id();                                 // PK autoincremental

            // Relaciones
            $table->unsignedBigInteger('id_rol');
            $table->unsignedBigInteger('id_opcion');

            // Permisos (todos comienzan en false)
            $table->boolean('puede_ver')->default(false);
            $table->boolean('puede_crear')->default(false);
            $table->boolean('puede_editar')->default(false);
            $table->boolean('puede_eliminar')->default(false);

            // Claves foráneas
            $table->foreign('id_rol')
                  ->references('id')
                  ->on('roles')
                  ->cascadeOnDelete();

            $table->foreign('id_opcion')
                  ->references('id')
                  ->on('opciones')
                  ->cascadeOnDelete();

            // Evitar duplicados para la misma combinación rol‑opción
            $table->unique(['id_rol', 'id_opcion']);

            $table->timestamps();                         // created_at y updated_at
        });
    }

    /**
     * Revierte la migración.
     */
    public function down(): void
    {
        Schema::dropIfExists('permisos');
    }
};
