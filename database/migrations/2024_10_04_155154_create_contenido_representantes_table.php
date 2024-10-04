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
        Schema::create('contenido_representantes', function (Blueprint $table) {
           $table->bigIncrements('id');
            $table->text('elaborado')->nullable();
            $table->text('revisado')->nullable();
            $table->text('certificado')->nullable();
            $table->text('aprobado')->default('LAILA TAJELDINE');
            $table->integer('delegate_id');
             $table->text('ipol')->nullable();
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
        Schema::dropIfExists('contenido_representantes');
    }
};