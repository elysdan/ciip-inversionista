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
        Schema::create('sector_empresas', function (Blueprint $table) {
            $table->bigIncrements('id')->primary();
            $table->bigInteger('enterprise_id')->nullable();
            $table->bigInteger('delegate_id')->nullable();
            $table->bigInteger('sector_id')->nullable();
            $table->float('cii')->nullable();
            $table->text('act')->nullable();
            $table->text('ip')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sector_empresas');
    }
};
