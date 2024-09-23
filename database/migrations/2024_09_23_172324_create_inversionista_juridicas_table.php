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
        Schema::create('inversionista_juridicas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('doc_identidad')->unique();
            $table->string('nacionalidad');
            $table->date('fecha_nacimiento');
            $table->integer('edad');
            $table->string('estado_civil');
            $table->string('sexo');
            $table->text('direccion');
            $table->string('rif');
            $table->string('telefono');
            $table->text('rrss')->nullable();
            $table->text('razon_social')->unique();
            $table->string('numero_identificacion')->unique();
            $table->text('desc_suxinta');
            $table->text('direccion_fiscal');
            $table->string('telefonoempresa');
            $table->string('emailempresa');
            $table->string('webempresa');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inversionista_juridicas');
    }
};
