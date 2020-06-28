<?php

namespace App\Repositories\Order;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class OrderRepository implements OrderInterface {

    protected $modelClass = Order::class;

    public function create(array $data): void
    {
        $user = Auth::user();

        $user->order->create($data);
    }

    public function getAllOfAuthUser(): Collection
    {
        $user = Auth::user();

        return $user->orders->get();
    }

}
