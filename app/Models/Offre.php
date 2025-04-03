<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    public function recruteur()
    {
        return $this->belongsTo(Recruteur::class, 'recruteur_id');
    }

    public function candidats()
    {
        return $this->belongsToMany(Candidat::class, 'candidat_offre', 'offre_id', 'candidat_id')
                    ->withPivot('date_postulation', 'etat', 'cv'); 
    }
    public function specialites()
    {
        return $this->belongsToMany(Specialite::class, 'offre_specialite', 'offre_id', 'specialite_id');
    }
}
