<?php
namespace App\Traits;

use App\Consts\Cash;

trait PriceCalc {

    public function getTotalPriceInUsd($pizzas)
    {
        $pricesForEachPizza = collect();

        $pizzas->each(function($pizza) use (&$pricesForEachPizza){
                $price = $pizza->price * $pizza->pivot->amount;
                $pricesForEachPizza->push($price);
            });

        return $pricesForEachPizza->sum() * Cash::DELIVERY_PRICE_USD;
    }

    public function getTotalPriceInEur($pizzas)
    {
        return $this->getTotalPriceInUsd($pizzas) * Cash::ONE_EUR_IN_USD;
    }
}

?>
