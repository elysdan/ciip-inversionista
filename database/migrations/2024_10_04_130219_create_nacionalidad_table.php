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
        Schema::create('nacionalidad', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->string('PAIS_NAC')->nullable();
            $table->string('GENTILICIO_NAC')->nullable();
            $table->string('ISO_NAC')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nacionalidad');
    }
};
