<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

}
