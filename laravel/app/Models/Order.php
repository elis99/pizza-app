<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Consts\Cash;
use App\Consts\Currency;
use App\Models\Currency as CurrencyModel;

class Order extends Model
{
    protected $fillable = [
        'address',
        'user_id'
    ];

    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class)
            ->withPivot('amount');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function currencies()
    {
        return $this->belongsToMany(CurrencyModel::class, 'order_currency')
            ->withPivot('total_price');
    }

    public function storePizzas(array $pizzas)
    {
        $pizzasForSync = [];

        foreach ($pizzas as $pizza) {
            $pizzasForSync[$pizza['pizza_id']] = ['amount' => $pizza['amount']];
        }

        $this->pizzas()
            ->sync($pizzasForSync);
    }

    public function storeTotalPrices()
    {
        $this->currencies()
            ->sync([
                Currency::USD => ['total_price' => $this->getTotalPriceInUsd()],
                Currency::EUR => ['total_price' => $this->getTotalPriceInEur()]
            ]);
    }

    public function getTotalPriceInUsd()
    {
        $pricesForEachPizza = collect();

        $this->pizzas
            ->each(function($pizza) use (&$pricesForEachPizza){
                $price = $pizza->price * $pizza->pivot->amount;
                $pricesForEachPizza->push($price);
            });

        return $pricesForEachPizza->sum() * Cash::DELIVERY_PRICE_USD;
    }

    public function getTotalPriceInEur()
    {
        return $this->getTotalPriceInUsd() * Cash::ONE_EUR_IN_USD;
    }
}

