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
        Schema::create('documento_verificacions', function (Blueprint $table) {
            $table->id();
            $table->string('documento');
            $table->string('descripcion');
            $table->string('nombres');
            $table->string('fecha');
            $table->string('estado');
            $table->foreignId('operacion_id')->constrained();
            $table->foreignId('unidad_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documento_verificacions');
    }
};
