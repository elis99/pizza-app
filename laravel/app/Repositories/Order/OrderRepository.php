<?php

namespace App\Repositories\Order;

use App\Models\Order;
use App\Models\Pizza;
use App\Traits\PriceCalc;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class OrderRepository implements OrderInterface {

    use PriceCalc;

    protected $modelClass = Order::class;

    public function create(array $data): void
    {
        $order = Auth::user()
            ->orders()
            ->create($data);

        $order->storePizzas($data['pizzas']);

        $order->storeTotalPrices();
    }

    public function getAllOfAuthUser(): Collection
    {
        return Auth::user()->orders;
    }

    public function calcPreOrderPrice(array $data)
    {
        $pizza_ids = [];

        foreach ($data['pizzas'] as $pizza) {
            $pizza_ids[] = $pizza['pizza_id'];
        }

        $pizzas = Pizza::find($pizza_ids);

        return [
            'total_usd' => $this->getTotalPriceInUsd($pizzas),
            'total_eur' => $this->getTotalPriceInEur($pizzas)
        ];
    }

}
