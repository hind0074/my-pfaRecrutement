<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidatEcole extends Model
{
    protected $table = 'candidat_ecole'; 

    protected $fillable = [
        'candidat_id',
        'ecole_id',
        'date_debut',
        'date_fin',
        'diplome',
    ];
}
