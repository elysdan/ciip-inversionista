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
        Schema::create('inversionista_naturals', function (Blueprint $table) {
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
            $table->string('telefono');
            $table->string('email');
            $table->text('rrss')->nullable();
            $table->bigInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inversionista_naturals');
    }
};
