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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('nom_produit')->unique();
            $table->string('description_produit');
            $table->string('image_produit')->nullable();
            $table->string('prix_vente');
            $table->string('quantite_produit');
            $table->string('categorie_produit');
            $table->string('nom_boutique');
            $table->string('nom_gestionnaire');

            $table->foreign('nom_boutique')->references('nom_boutique')->on('boutiques')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nom_gestionnaire')->references('name')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
