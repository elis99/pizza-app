<?php

namespace App\Repositories\Order;

use Illuminate\Database\Eloquent\Collection;

interface OrderInterface {

    public function create(array $data): void;

    public function getAllOfAuthUser(): Collection;

}
