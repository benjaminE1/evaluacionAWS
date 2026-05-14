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
        Schema::create('tanques', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->foreignId('pais_id')->constrained('pais');
            $table->foreignId('fabricante_id')->constrained('fabricantes');
            $table->foreignId('combustible_id')->constrained('combustibles');
            $table->integer('blindaje')->nullable();
            $table->integer('potencia_motor')->nullable();
            $table->integer('velocidad_maxima')->nullable();
            $table->year('año_produccion')->nullable();
            $table->text('descripcion_historica')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanques');
    }
};
