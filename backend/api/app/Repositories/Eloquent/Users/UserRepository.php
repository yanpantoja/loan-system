<?php

namespace App\Repositories\Eloquent\Users;

use App\Models\User;

class UserRepository
{
    public function findAll()
    {
        return User::with('collections')->get();
    }

    public function findUser(string $email)
    {
        return User::where('email', $email)->first();
    }

    public function createUser(array $input)
    {
        return User::create([
            'name' => $input['user_name'],
            'email' => $input['email']
        ]);
    }

    public function updateUser(int $id, array $input)
    {

    }

}
