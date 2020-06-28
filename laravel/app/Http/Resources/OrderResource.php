<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'first_name' => $this->user->first_name,
            'last_name' => $this->user->last_name,
            'address' => $this->address,
            'user' => $this->user,
            'pizzas' => $this->pizzas,
        ];
    }
}
