<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boutique extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_boutique',
        'email_boutique',
        'contact_boutique',
        'site_web_boutique',
        'localisation_boutique',
        'nom_proprietaire',
        'logo_boutique',
        'nom_proprietaire',
    ];
}
