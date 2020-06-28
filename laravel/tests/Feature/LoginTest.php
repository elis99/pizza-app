<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{
    public function testLogin()
    {
        $user = factory(User::class)
            ->make();

        $data = [
            'email' => $user->email,
            'password' => '123456'
        ];

        $this->json('POST', '/api/v1/user/login', $data)
            ->assertStatus(201)
            ->assertJsonStructure([
                'user',
                'token'
            ]);

    }

    public function testWrongCredentials()
    {
        $data = [
            'email' => $this->faker->firstName(),
            'password' => $this->faker->password()
        ];

        $this->json('POST', '/api/v1/user/login', $data)
            ->asserStatus(422)
            ->assertJsonStructure([
                'message',
                'description'
            ]);
    }

}
