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
        Schema::create('inventario', function (Blueprint $table) {
            $table->id('id_producto_inventario'); // Clave primaria personalizada

            $table->unsignedBigInteger('id_producto');
            $table->integer('stock')->default(0);
            $table->unsignedBigInteger('fk_sitio');

            // Claves foráneas
            $table->foreign('id_producto')->references('id')->on('productos')->cascadeOnDelete();
            $table->foreign('fk_sitio')->references('id')->on('sitio')->cascadeOnDelete();

            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Revierte la migración.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventario');
    }
};
