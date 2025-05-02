<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reapprovisionnement extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_produit',
        'qte_ajoutee',
        'nom_fournisseur',
        'status',
        'date_reapprovisionnement',
        'montant_total',
        'nom_gestionnaire',
        'nom_boutique',
    ];

}
