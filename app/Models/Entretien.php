<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entretien extends Model
{
    public function recruteur()
    {
        return $this->belongsTo(Recruteur::class, 'recruteur_id');
    }

    // Relation inverse un-à-plusieurs avec le candidat
    public function candidat()
    {
        return $this->belongsTo(Candidat::class, 'candidat_id');
    }
}
