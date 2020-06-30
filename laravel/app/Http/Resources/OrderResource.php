<?php

namespace App\Http\Resources;

use App\Consts\Currency;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PizzaResource;
use App\Http\Resources\CurrencyResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'address' => $this->address,
            'pizzas' => PizzaResource::collection($this->pizzas),
            'total_prices' => CurrencyResource::collection($this->currencies),
            'created_at' => $this->created_at
        ];
    }
}
