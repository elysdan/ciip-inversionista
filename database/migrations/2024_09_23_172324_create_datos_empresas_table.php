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
        Schema::create('datos_empresas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('razonsocial');
            $table->string('rif')->nullable();
             $table->string('identificador')->nullable();
            $table->bigInteger('pais_origen');
            $table->bigInteger('lregistro');
            $table->string('status')->default('1');
            $table->text('direccion');
            $table->text('correo');
            $table->text('telefono');
            $table->text('correlativo')->nullable();
            $table->text('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_empresas');
    }
};
