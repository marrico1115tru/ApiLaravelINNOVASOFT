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
        Schema::create('sedes', function (Blueprint $table) {
            $table->id(); // id [PK]
            $table->string('nombre', 100);
            $table->string('ubicacion', 150);
            $table->unsignedBigInteger('id_centro_formacion');

            $table->timestamps();

            // Llave foránea a la tabla centro_formacion
            $table->foreign('id_centro_formacion')->references('id')->on('centro_formacion')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sedes');
    }
};
