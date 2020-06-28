<?php

namespace App\Repositories\Pizza;

use Illuminate\Database\Eloquent\Collection;
interface PizzaInterface {

    public function all(): Collection;

}
