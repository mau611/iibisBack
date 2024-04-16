<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('datos_iibismeds', function (Blueprint $table) {
            $table->id();
            $table->string('cargo');
            $table->date('fechaIngreso');
            $table->float('horas');
            $table->string('resolucion');
            $table->string('tituloNacional');
            $table->date('fechaTituloNacional');
            $table->foreignId('investigador_id')->constrained();
            $table->foreignId('unidad_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_iibismeds');
    }
};
