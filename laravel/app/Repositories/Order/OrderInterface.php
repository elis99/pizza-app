<?php

namespace App\Repositories\Pizza;

use Illuminate\Database\Eloquent\Collection;

interface OrderInterface {

    public function create(array $data): void;

    public function getAllByAuthUser(): Collection;

}
