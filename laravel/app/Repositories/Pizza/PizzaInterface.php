<?php

namespace App\Repositories\Pizza;

use Illuminate\Support\Collection;

interface PizzaInterface {

    public function all(): Collection;

}
