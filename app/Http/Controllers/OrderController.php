<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index()
    {
        $orders = Order::with("user", "books", "coupon")->where("user_id", auth()->id())->get();
        return view("orders.index", compact("orders"));
    }
}
