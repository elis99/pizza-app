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

        $order->storeTotalPrices($data['pizzas']);
    }

    public function getAllOfAuthUser(): Collection
    {
        $orders = Auth::user()
            ->orders()
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return $orders;
    }

    public function calcPreOrderPrice(array $data)
    {
        return [
            'total_usd' => $this->getTotalPriceInUsd($data['pizzas']),
            'total_eur' => $this->getTotalPriceInEur($data['pizzas'])
        ];
    }

}
