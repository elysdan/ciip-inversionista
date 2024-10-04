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
        Schema::create('contenido_empresas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigIncrements('elaborado')->nullable();
            $table->bigIncrements('revisado')->nullable();
            $table->bigIncrements('certificado')->nullable();
            $table->bigIncrements('aprobado')->default('LAILA TAJELDINE');
            $table->integer('enterprise_id');
            $table->text('oci')->nullable();
            $table->text('fbi')->nullable();
            $table->text('ofac')->nullable();
            $table->text('ue')->nullable();
            $table->text('cso')->nullable();
            $table->text('ip')->nullable();
            $table->text('icij')->nullable();
            $table->text('tsj')->nullable();
            $table->text('rnc')->nullable();
            $table->text('ef')->nullable();
            $table->text('ex')->nullable();
            $table->integer('status')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contenido_empresas');
    }
};
