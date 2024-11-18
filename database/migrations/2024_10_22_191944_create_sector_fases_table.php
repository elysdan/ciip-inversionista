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
        Schema::create('sector_fases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('sector_id')->nullable();
            $table->date('fase1i')->nullable();
            $table->date('fase2i')->nullable();
            $table->date('fase3i')->nullable();
            $table->date('fase4i')->nullable();
            $table->date('fase5i')->nullable();
            $table->date('fase6i')->nullable();
            $table->date('fase7i')->nullable();

            $table->date('fase1f')->nullable();
            $table->date('fase2f')->nullable();
            $table->date('fase3f')->nullable();
            $table->date('fase4f')->nullable();
            $table->date('fase5f')->nullable();
            $table->date('fase6f')->nullable();
            $table->date('fase7f')->nullable();


            $table->bigInteger('fase1status')->nullable();
            $table->bigInteger('fase2status')->nullable();
            $table->bigInteger('fase3status')->nullable();
            $table->bigInteger('fase4status')->nullable();
            $table->bigInteger('fase5status')->nullable();
            $table->bigInteger('fase6status')->nullable();
            $table->bigInteger('fase7status')->nullable();

            $table->text('ob')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sector_fases');
    }
};
