<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
    protected $table = 'specialites';

    protected $fillable = ['nom', 'description', 'categorie_id'];

    // Une spécialité appartient à une seule catégorie
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
