<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Validation\Validator;

class RegisterTest extends TestCase
{
    public function testRegister()
    {
        $response = $this->json('POST', '/api/v1/user', [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->email(),
            'password' => $this->faker->password()
        ]);
        // add check in db

        $response->assertStatus(202);
    }
}
