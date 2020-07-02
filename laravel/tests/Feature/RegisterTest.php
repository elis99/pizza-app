<?php

namespace Tests\Feature;

use Tests\TestCase;
class RegisterTest extends TestCase
{
    public function testRegister()
    {
        $data = [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->email(),
            'password' => $this->faker->password()
        ];

        $response = $this->json('POST', '/api/v1/user', $data);

        $this->checkDatabase($data);

        $response->assertStatus(201);
    }

    public function checkDatabase(array $data)
    {
        unset($data['password']);

        $this->assertDatabaseHas('users', $data);
    }
}
