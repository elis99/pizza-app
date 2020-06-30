<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Consts\Currency;
use App\Models\Currency as CurrencyModel;
use App\Traits\PriceCalc;

class Order extends Model
{
    use PriceCalc;

    protected $fillable = [
        'address',
        'user_id'
    ];

    protected $casts = [
        'created_at' => 'date_time'
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

    public function storeTotalPrices(array $pizzas)
    {
        $this->currencies()
            ->sync([
                Currency::USD => ['total_price' => $this->getTotalPriceInUsd($pizzas)],
                Currency::EUR => ['total_price' => $this->getTotalPriceInEur($pizzas)]
            ]);
    }
}

