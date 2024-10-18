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
        Schema::create('datos_embajadas', function (Blueprint $table) {
            $table->bigIncrements('id')->primary();
             $table->bigInteger('enterprise_id')->nullable();
              $table->bigInteger('delegate_id')->nullable();
            $table->text('ne')->nullable();
            $table->text('oe')->nullable();
            $table->text('inv')->nullable();
            $table->text('ex')->nullable();
            $table->text('al')->nullable();
            $table->text('ob')->nullable();
            $table->bigInteger('pais')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_embajadas');
    }
};
