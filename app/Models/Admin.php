<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $primaryKey = 'user_id';
    public $incrementing = false;
    protected $keyType = 'int';
    protected $fillable = [
        'nom',
        'contact_phone',
        'photo_profil',
        'email',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
