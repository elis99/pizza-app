<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Consts\Cash;

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

    public function getTotalInUsd()
    {
        $pricesForEachPizza = collect();

        $this->pizzas
            ->each(function($pizza) use (&$pricesForEachPizza){
                $price = $pizza->price * $pizza->pivot->amount;
                $pricesForEachPizza->push($price);
            });

        return $pricesForEachPizza->sum() * Cash::DELIVERY_PRICE_USD;
    }

    public function getTotalInEur()
    {
        return $this->getTotalInUsd() * Cash::ONE_EUR_IN_USD;
    }
}

