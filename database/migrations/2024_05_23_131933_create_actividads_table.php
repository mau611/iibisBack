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
        Schema::create('actividads', function (Blueprint $table) {
            $table->id();
            $table->string('actividad');
            $table->integer('meta');
            $table->string('indicador', 190);
            $table->string('fuenteVerificacion', 190);
            $table->date('inicio');
            $table->date('fin');
            $table->integer('peso');
            $table->foreignId('investigador_id')->constrained(); //responsable
            $table->foreignId('componente_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actividads');
    }
};
