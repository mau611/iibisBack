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
        Schema::create('operacions', function (Blueprint $table) {
            $table->id();
            $table->integer('numeroOperacion');
            $table->string('operacion');
            $table->string('producto');
            $table->string('indicador');
            $table->integer('lineaBase');
            $table->string('medioVerificacion', 190);
            $table->date('inicio');
            $table->date('fin');
            $table->string('categoriaProgramatica');
            $table->double('monto');
            $table->integer('gestion');
            $table->foreignId('investigador_id')->constrained(); //responsable
            $table->foreignId('tipo_id')->constrained();
            $table->foreignId('objetivo_especifico_id')->constrained();
            $table->foreignId('subactividad_id')->constrained()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operacions');
    }
};
