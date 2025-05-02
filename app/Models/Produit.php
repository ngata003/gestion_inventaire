<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_produit',
        'description_produit',
        'prix_vente',
        'quantite_produit',
        'categorie_produit',
        '',
        'boutique_created',
        'nom_gestionnaire',
        'nom_boutique',
    ];

}
