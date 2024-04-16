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
        Schema::create('titulo_posgraduals', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('anho');
            $table->string('universidad');
            $table->string('gradoObtenido');
            $table->string('archivo');
            $table->foreignId('investigador_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('titulo_posgraduals');
    }
};
