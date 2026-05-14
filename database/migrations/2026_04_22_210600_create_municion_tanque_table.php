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
        Schema::create('municion_tanque', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tanque_id')->constrained('tanques')->onDelete('cascade');
            $table->foreignId('municion_id')->constrained('municiones')->onDelete('cascade');
            $table->timestamps();

            // Evitar duplicados
            $table->unique(['tanque_id', 'municion_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('municion_tanque');
    }
};
