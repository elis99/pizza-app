<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Http\Requests\PreOrderRequest;
use App\Http\Requests\CreateOrderRequest;
use App\Repositories\Order\OrderRepository;

class OrderController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function create(CreateOrderRequest $request)
    {
       $this->orderRepository->create($request->validated());

       return response(null, 201);
    }

    public function getAllOfAuthUser()
    {
        $userOrders = $this->orderRepository->getAllOfAuthUser();

        return response(OrderResource::collection($userOrders), 200);
    }

    public function calcPreOrderPrice(PreOrderRequest $request)
    {
        $total = $this->orderRepository->calcPreOrderPrice($request->validated());

        return response($total, 200);
    }
}
