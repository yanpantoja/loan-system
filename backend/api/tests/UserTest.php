<?php

use App\Models\User;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UserTest extends TestCase
{

    public function testCreateUser()
    {
        $user = User::factory()->raw();
        $response = $this->json('POST', '/users', [
            'user_name' => $user['name'],
            'email' => $user['email'],
        ]);

        $response->assertResponseStatus(201);
    }
}
