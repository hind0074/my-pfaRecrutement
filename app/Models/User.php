<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use  Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'contact_phone',
         'type',
    ];

    protected $hidden = [
        'password',
    ];

    public function candidat()
    {
        return $this->hasOne(Candidat::class);
    }

    public function recruteur()
    {
        return $this->hasOne(Recruteur::class);
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }
}
