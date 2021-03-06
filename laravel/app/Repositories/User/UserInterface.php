<?php

namespace App\Repositories\User;

use App\Models\User;

interface UserInterface {

    public function create(array $data): User;

    public function checkAndGetUserWithToken(array $data): array;
}
