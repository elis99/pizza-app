<?php

namespace App\Repositories\Pizza;

use App\Models\Pizza;
use Illuminate\Database\Eloquent\Collection;

class PizzaRepository implements PizzaInterface {

    protected $modelClass = Pizza::class;

    public function all(): Collection
    {
        return $this->modelClass::all();
    }

}
