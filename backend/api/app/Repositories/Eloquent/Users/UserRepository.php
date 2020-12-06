<?php

namespace App\Repositories\Eloquent\Users;

use App\Models\User;

class UserRepository
{
    public function findAll()
    {
        return User::all();
    }

    public function createUser(array $input)
    {
        return User::create($input);
    }
}
