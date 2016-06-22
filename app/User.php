<?php

namespace Orquestra;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function device() 
    {
        return $this->hasMany('Orquestra\Device');
    }
}
