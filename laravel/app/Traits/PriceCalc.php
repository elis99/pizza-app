<?php
namespace App\Traits;

use App\Consts\Cash;
use App\Models\Pizza;

trait PriceCalc {

    public function getTotalPriceInUsd($pizzas) 
    {
        $pricesForEachPizza = collect();

        foreach($pizzas as $pizza) {
            $pizzaModel = Pizza::find($pizza['pizza_id']);

            $price = $pizzaModel->price * $pizza['amount'];
            $pricesForEachPizza->push($price);
        }

        return $pricesForEachPizza->sum() + Cash::DELIVERY_PRICE_USD;
    }

    public function getTotalPriceInEur($pizzas)
    {
        return $this->getTotalPriceInUsd($pizzas) * Cash::ONE_EUR_IN_USD;
    }
}

?>
