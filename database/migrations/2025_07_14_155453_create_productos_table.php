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
        Schema::create('productos', function (Blueprint $table) {
            $table->id(); // Clave primaria

            $table->string('nombre', 100);
            $table->text('descripcion')->nullable();
            $table->date('fecha_vencimiento')->nullable();

            // Clave foránea hacia categorias_productos
            $table->unsignedBigInteger('id_categoria');
            $table->foreign('id_categoria')
                ->references('id')
                ->on('categorias_productos')
                ->cascadeOnDelete();

            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Revierte la migración.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
