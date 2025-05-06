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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('nom_gestionnaire')->nullable();
            $table->string('nom_boutique')->nullable();
            $table->string('type');

            $table->foreign('nom_gestionnaire')->references('name')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nom_boutique')->references('nom_boutique')->on('boutiques')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
