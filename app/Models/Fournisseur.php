<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_fournisseur',
        'email_fournisseur',
        'contact_fournisseur',
        'pays',
        'nom_boutique',
        'nom_gestionnaire',
    ];
}
