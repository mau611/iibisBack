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
        Schema::create('proyecto_sispoas', function (Blueprint $table) {
            $table->id();
            $table->string('tituloProyecto', 200);
            $table->double('presupuestoTotal');
            $table->date('inicio');
            $table->date('fin');
            $table->string('objetivoGeneral', 200);
            $table->string('finalidad', 200);
            $table->string('justificacion', 200);
            $table->string('beneficiarios', 200);
            $table->string('resultadosPrincipales', 200);
            $table->string('financiamiento');
            $table->foreignId('tipo_id')->constrained();
            $table->foreignId('investigador_id')->constrained(); //responsable
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyecto_sispoas');
    }
};
