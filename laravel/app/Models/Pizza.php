<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Consts\Cash;

class Pizza extends Model
{
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function getPriceInEur()
    {
        return $this->price * Cash::ONE_EUR_IN_USD;
    }
}
