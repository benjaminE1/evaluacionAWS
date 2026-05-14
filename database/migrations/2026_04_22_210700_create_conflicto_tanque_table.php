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
        Schema::create('conflicto_tanque', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tanque_id')->constrained('tanques')->onDelete('cascade');
            $table->foreignId('conflicto_id')->constrained('conflictos')->onDelete('cascade');
            $table->timestamps();

            // Evitar duplicados
            $table->unique(['tanque_id', 'conflicto_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conflicto_tanque');
    }
};
