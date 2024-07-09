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
        Schema::create('seguimiento_actividads', function (Blueprint $table) {
            $table->id();
            $table->string('estado')->nullable();
            $table->integer('porcentajeAvance')->nullable();
            $table->double('montoEjecutado')->nullable();
            $table->integer('meta')->nullable();
            $table->string('observacion')->nullable();
            $table->boolean('modificar')->nullable();
            $table->integer('periodo')->nullable();
            $table->foreignId('actividad_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguimiento_actividads');
    }
};
