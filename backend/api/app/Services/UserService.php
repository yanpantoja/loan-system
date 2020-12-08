<?php

namespace App\Services;

use App\Repositories\Eloquent\Users\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function defineUserWhoLoaned(array $input)
    {

        $user = $this->userRepository->findUser($input['email']);

        if($user) {
            return $user->id;
        }

        $userCreated = $this->userRepository->createUser($input);
        return $userCreated->id;
    }

    public function updateUser(array $input): void
    {
        $this->userRepository->updateUser($input);
    }
}
