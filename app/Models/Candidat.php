<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    protected $primaryKey = 'user_id';
    public $incrementing = false;
    protected $keyType = 'int';
    protected $fillable = [
        'user_id', 'adresse', 'experience', 'competences', 'langues', 'linkedin', 'ecole_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ecoles()
{
    return $this->belongsToMany(Ecole::class, 'candidat_ecole')
                ->withPivot('diplome', 'date_debut', 'date_fin') 
                ->withTimestamps(); 
}
    public function offres()
    {
        return $this->belongsToMany(Offre::class, 'candidat_offre', 'candidat_id', 'offre_id')
                    ->withPivot('date_postulation', 'etat', 'cv'); 
    }

    public function entretiens()
    {
        return $this->hasMany(Entretien::class, 'candidat_id');
    }
}
