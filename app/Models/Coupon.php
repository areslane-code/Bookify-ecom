<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;


    protected $fillable = ["code", "percentage", "expires_at"];

    public $timestamps = false;


    public function users()
    {
        return $this->belongsToMany(User::class)->where("role", "0");
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
