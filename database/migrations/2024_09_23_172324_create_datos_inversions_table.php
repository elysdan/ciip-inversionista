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
        Schema::create('datos_inversions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->bigInteger('inversionista_juridicas_id');
            $table->text('sectors_id');
            $table->text('intencion');
            $table->text('activo_susceptible_inversion');
            $table->text('ubicacion');
            $table->enum('tipo_intencion', ['PRINCIPAL', 'SECUNDARIA']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_inversions');
    }
};
