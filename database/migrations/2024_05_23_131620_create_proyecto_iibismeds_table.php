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
        Schema::create('proyecto_iibismeds', function (Blueprint $table) {
            $table->id();
            $table->string('producto');
            $table->string('indicador', 200);
            $table->integer('lineaBase');
            $table->integer('metaTotal');
            $table->string('medioVerificacion', 200);
            $table->date('inicioGestion');
            $table->date('finGestion');
            $table->string('categoriaProgramatica', 200);
            $table->string('sisin');
            $table->string('dicyt');
            $table->double('montoGestion');
            $table->foreignId('proyecto_sispoa_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyecto_iibismeds');
    }
};
