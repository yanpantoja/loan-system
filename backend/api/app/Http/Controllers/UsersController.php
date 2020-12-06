<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserCreateRequest;
use App\Repositories\Eloquent\Users\UserRepository;

class UsersController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->findAll();

        if(is_null($users)) {
            return response()->json('', 204);
        }

        return response()->json([
            'status' => 'success',
            'message' => $users
        ]);
    }

    public function store(UserCreateRequest $request)
    {
        $input = $request->all();
        $user = $this->userRepository->createUser($input);

        return response()->json([
            'status' => 'success',
            'message' => $user
        ], 201);
    }
}
