<?php
namespace App\Exceptions;

use Exception;

class UserNotConfirmedException extends Exception
{
    public function render()
    {
        $error = [
            'message' => 'USER_NOT_CONFIRMED',
            'description' => 'user not confirmed'
        ];

        return response($error, 422);
    }
}
