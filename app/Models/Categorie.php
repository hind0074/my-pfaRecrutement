<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table = 'categories';

    protected $fillable = ['nom', 'description'];

    // Une catégorie a plusieurs spécialités
    public function specialites()
    {
        return $this->hasMany(Specialite::class);
    }
}
