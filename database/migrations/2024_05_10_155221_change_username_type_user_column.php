<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('Usuarios', function (Blueprint $table) {
            $table->text('username')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('Usuarios', function (Blueprint $table) {
            $table->string('username')->change();
        });
    }
};
