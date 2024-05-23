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
        Schema::create('seguimiento_gestions', function (Blueprint $table) {
            $table->id();
            $table->string('estado');
            $table->integer('porcentajeAvance');
            $table->double('montoEjecutado');
            $table->integer('meta');
            $table->string('observacion');
            $table->boolean('modificar'); //(si,no)
            $table->string('documento');
            $table->foreignId('proyecto_iibismed_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguimiento_gestions');
    }
};
