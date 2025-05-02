<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_client',
        'montant_total',
        'montant_paye',
        'remboursement',
        'nom_gestionnaire',
        'nom_boutique'
    ];
}
