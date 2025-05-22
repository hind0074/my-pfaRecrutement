<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entretien extends Model
{
    protected $table = 'entretien';
    protected $fillable = [
        'recruteur_id',
        'candidat_id',
        'date_heure',
        'etat',
        'message', 
        'offre_id',
    ];

    public function recruteur()
    {
        return $this->belongsTo(Recruteur::class, 'recruteur_id');
    }

    // Relation inverse un-à-plusieurs avec le candidat
    public function candidat()
    {
        return $this->belongsTo(Candidat::class, 'candidat_id');
    }
    public function getOffre()
    {
        // Accéder au Candidat via la relation, puis aux Offres associées
        return $this->candidat->offres()->first(); // Utilise `first()` pour récupérer la première offre associée
    }
    public function offre()
    {
        return $this->belongsTo(offre::class, 'offre_id');
    }
    
}
