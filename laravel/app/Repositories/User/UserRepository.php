<?php

namespace App\Repositories\User;

use App\Exceptions\UserNotConfirmedException;
use App\Exceptions\WrongCredentialsException;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class UserRepository implements UserInterface {

    use AuthenticatesUsers;

    protected $modelClass = User::class;

    public function create(array $data): User
    {
        $data['password'] = Hash::make($data['password']);

        return $this->modelClass::create($data);
    }

    public function checkAndGetUserWithToken(array $data)
    {
        $foundUser = $this->modelClass::where('email', $data['email'])
            ->first();

        if ($foundUser) {
            $isCorrectPass = Hash::check($data['password'], $foundUser->password);
        }

        if (!$foundUser || !$isCorrectPass) {
            throw new WrongCredentialsException;
        }

        if (!$foundUser->email_verified_at){
            throw new UserNotConfirmedException;
        }

        $tokenData = $foundUser->createToken($data['password']);

        return [
            'token' => $tokenData,
            'user' => UserResource::make($foundUser)
        ];
    }
}
