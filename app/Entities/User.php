<?php

namespace App\Entities;

use Dark\Database\Underground\Builder\Entity;

class User extends Entity
{
    protected $table = 'usuarios';
    
    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'email_verified_at',
        'deleted_at'
    ];
}
