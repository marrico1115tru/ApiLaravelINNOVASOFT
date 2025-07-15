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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id(); 

            
            $table->string('nombre', 100);
            $table->string('apellido', 100)->nullable();
            $table->string('cedula', 20)->unique();
            $table->string('email', 100)->unique();
            $table->string('telefono', 20)->nullable();

        
            $table->unsignedBigInteger('id_area');
            $table->unsignedBigInteger('id_rol');
            $table->unsignedBigInteger('id_ficha_formacion')->nullable();

            
            $table->string('password'); 

            $table->timestamps(); 

        
            $table->foreign('id_area')
                ->references('id')
                ->on('areas')
                ->cascadeOnDelete();

            $table->foreign('id_rol')
                ->references('id')
                ->on('roles')
                ->cascadeOnDelete();

            $table->foreign('id_ficha_formacion')
                ->references('id')
                ->on('fichas_formacion')
                ->nullOnDelete(); 
        });
    }

    /**
     * Revierte la migración.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
