<?php
namespace App\Exceptions;

use Exception;

class WrongCredentialsException extends Exception
{
    public function render()
    {
        $error = [
            'message' => 'WRONG_CREDENTIALS',
            'description' => 'wrong credentials'
        ];

        return response($error, 422);
    }
}
