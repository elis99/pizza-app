<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderPizza extends Pivot
{
   protected $table = "order_pizza";

   protected $fillable = [
        'order_id',
        'pizza_id',
        'amount'
   ];
}
