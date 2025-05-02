<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventes_details extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_produit',
        'prix_vente',
        'qte_commandee',
        'total',
        'id_vente',
        'nom_gestionnaire',
        'nom_boutique'
    ];
    
}
