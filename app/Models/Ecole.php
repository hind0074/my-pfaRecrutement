<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ecole extends Model
{
    protected $fillable = [
        'nom',
        'adresse',
        'site_web',
        'ville',
        'pays',
        'type',
    ];

    public function candidats()
    {
        return $this->belongsToMany(Candidat::class, 'candidat_ecole')->withTimestamps();
    }
}
