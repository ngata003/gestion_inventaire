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
        Schema::create('reapprovisionnements', function (Blueprint $table) {
            $table->id();
            $table->string('nom_produit');
            $table->string('nom_fournisseur');
            $table->string('qte_commandee');
            $table->string('status');
            $table->string('montant_total');
            $table->date('date_reapprovisionnement');
            $table->string('nom_gestionnaire');
            $table->string('nom_boutique');

            $table->foreign('nom_fournisseur')->references('nom_fournisseur')->on('fournisseurs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nom_gestionnaire')->references('name')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nom_boutique')->references('nom_boutique')->on('boutiques')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reapprovisionnements');
    }
};
