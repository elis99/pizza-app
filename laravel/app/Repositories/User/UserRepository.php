<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserInterface {

    protected $modelClass = User::class;

    public function create(array $data): User
    {
        $data['password'] = Hash::make($data['password']);

        return $this->modelClass::create($data);
    }
}
