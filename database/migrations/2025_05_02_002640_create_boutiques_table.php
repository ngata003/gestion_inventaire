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
        Schema::create('boutiques', function (Blueprint $table) {
            $table->id();
            $table->string('nom_boutique')->unique();
            $table->string('contact_boutique')->unique();
            $table->string('localisation_boutique');
            $table->string('email_boutique')->unique();
            $table->string('site_web_boutique')->nullable();
            $table->string('nom_proprietaire');
            $table->string('logo_boutique')->nullable();

            $table->foreign('nom_proprietaire')->references('name')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boutiques');
    }
};
