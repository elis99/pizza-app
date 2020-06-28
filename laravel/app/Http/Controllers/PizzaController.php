<?php

namespace App\Http\Controllers;

use App\Repositories\Pizza\PizzaRepository;
use App\Http\Resources\PizzaResource;

class PizzaController extends Controller
{
    protected $pizzaRepository;

    public function __construct(PizzaRepository $pizzaRepository)
    {
        $this->pizzaRepository = $pizzaRepository;
    }

    public function all()
    {
        $pizzas = $this->pizzaRepository->all();

        return response(PizzaResource::collection($pizzas), 200);
    }
}
