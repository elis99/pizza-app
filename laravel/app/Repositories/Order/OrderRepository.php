<?php

namespace App\Repositories\Order;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

use App\Models\Pizza;

class OrderRepository implements OrderInterface {

    protected $modelClass = Order::class;

    public function create(array $data): void
    {
        $user = Auth::user();

        $order = $user->orders()
            ->create($data);

        $pizzasForSync = [];

        foreach ($data['pizzas'] as $pizza) {
            $pizzasForSync[$pizza['pizza_id']] = ['amount' => $pizza['amount']];
        }

        $order->pizzas()
            ->sync($pizzasForSync);
    }

    public function getAllOfAuthUser(): Collection
    {
        $user = Auth::user();

        return $user->orders->get();
    }

}
