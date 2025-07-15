<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('centro_formacion', function (Blueprint $table) {
            $table->id(); 
            $table->string('nombre', 100);
            $table->string('ubicacion', 150);
            $table->string('telefono', 20);
            $table->string('email', 100);
            $table->unsignedBigInteger('id_municipio');

            $table->timestamps();

            
            $table->foreign('id_municipio')->references('id')->on('municipios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centro_formacion');
    }
};
