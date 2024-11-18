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
        Schema::create('redes_sociales_delegados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('delegate_id')->nullable();
            $table->timestamps();
            $table->bigInteger('site')->nullable();
            $table->text('username')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redes_sociales_delegados');
    }
};
