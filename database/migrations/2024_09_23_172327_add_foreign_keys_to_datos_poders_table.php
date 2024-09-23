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
        Schema::table('datos_poders', function (Blueprint $table) {
            $table->foreign(['inversionista_juridicas_id'])->references(['id'])->on('inversionista_juridicas')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('datos_poders', function (Blueprint $table) {
            $table->dropForeign('datos_poders_inversionista_juridicas_id_foreign');
            $table->dropForeign('datos_poders_user_id_foreign');
        });
    }
};
