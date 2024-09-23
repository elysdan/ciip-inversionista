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
        Schema::create('datos_representantes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->bigInteger('inversionista_juridicas_id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('doc_identidad');
            $table->string('telefono');
            $table->string('email');
            $table->text('rrss')->nullable();
            $table->enum('tipo_representante', ['LEGAL', 'APODERADO']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_representantes');
    }
};
