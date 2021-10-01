<?php

namespace App\Repositories;

use App\Entities\User;

class UserRepository extends Repository
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }
}
