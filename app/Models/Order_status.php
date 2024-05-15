<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_status extends Model
{
    public $timestamps = false;

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
