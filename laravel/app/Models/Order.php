<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'address',
        'user_id'
    ];

    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
