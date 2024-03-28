<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    use HasFactory;
    protected $fillable = [
        'marque',
        'modele',
        'kilometrage',
        'annee',
        'prix',
        'puissance',
       'motorisation',
        'carburant',
        'options',

    ];
}
