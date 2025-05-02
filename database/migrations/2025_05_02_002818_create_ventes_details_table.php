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
        Schema::create('ventes_details', function (Blueprint $table) {
            $table->id();
            $table->string('nom_produit');
            $table->string('prix_vente');
            $table->string('qte_commandee');
            $table->string('total');
            $table->unsignedBigInteger('id_vente');
            $table->string('nom_gestionnaire');
            $table->string('nom_boutique');

            $table->foreign('nom_gestionnaire')->references('name')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('nom_boutique')->references('nom_boutique')->on('boutiques')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventes_details');
    }
};
