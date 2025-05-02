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
        Schema::create('reapprovisionnement', function (Blueprint $table) {
            $table->string('nom_produit');
            $table->string('qte_ajoutee');
            $table->string('nom_fournisseur');
            $table->string('status');
            $table->date('date_reapprovisionnement');
            $table->string('nom_boutique');
            $table->string('nom_gestionnaire');
            $table->string('montant_total');

            $table->foreign('nom_gestionnaire')->references('name')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nom_boutique')->references('nom_boutique')->on('boutiques')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reapprovisionnement');
    }
};
