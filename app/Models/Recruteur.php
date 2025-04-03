<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recruteur extends Model
{ 
    protected $primaryKey = 'user_id';
    public $incrementing = false;
    protected $keyType = 'int';
    protected $fillable = [
        'user_id',
        'entreprise',
        'poste',
        'descriptionEntreprise',
        'Localisation',
        'website',
        'logo',
    ];
    
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relation un-à-plusieurs avec les offres
    public function offres()
    {
        return $this->hasMany(Offre::class, 'recruteur_id');
    }

    // Relation un-à-plusieurs avec les entretiens
    public function entretiens()
    {
        return $this->hasMany(Entretien::class, 'recruteur_id');
    }
}
