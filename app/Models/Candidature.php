<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Candidature extends Model
{
    protected $table = 'candidat_offre';

    protected $primaryKey = ['candidat_id', 'offre_id']; // composite key (pas géré nativement)

    public $incrementing = false;

    protected $fillable = [
        'candidat_id',
        'offre_id',
        'cv',
        'date_postulation',
        'etat',
    ];

    public function offre(): BelongsTo
    {
        return $this->belongsTo(Offre::class, 'offre_id');
    }

    public function candidat(): BelongsTo
    {
        return $this->belongsTo(Candidat::class, 'candidat_id');
    }
}
