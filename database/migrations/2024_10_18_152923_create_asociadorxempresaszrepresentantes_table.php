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
        Schema::create('asociador_empresas_representantes', function (Blueprint $table) {
            $table->bigIncrements('id')->primary();
            $table->bigInteger('delegate_id')->nullable();
            $table->bigInteger('enterprise_id')->nullable();
            $table->bigInteger('type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asociador_empresas_representantes');
    }
};
