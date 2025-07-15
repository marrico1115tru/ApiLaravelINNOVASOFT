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
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_entrega');
            $table->string('tipo_movimiento', 50);
            $table->integer('cantidad');
            $table->unsignedBigInteger('id_producto_inventario');
            $table->date('fecha_movimiento');

            // Claves foráneas
            $table->foreign('id_entrega')->references('id')->on('entrega_material')->cascadeOnDelete();
            $table->foreign('id_producto_inventario')->references('id_producto_inventario')->on('inventario')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Revierte la migración.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimientos');
    }
};
