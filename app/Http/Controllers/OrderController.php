<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookOrder;
use App\Models\Coupon;
use App\Models\CouponUser;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class OrderController extends Controller
{
    //
    public function index()
    {
        $orders = Order::with("user", "books", "coupon")->where("user_id", auth()->id())->get();
        return view("orders.index", compact("orders"));
    }

    public function addToCart(Request $request)
    {
        $cart = Session::get("cart");

        if (!isset($cart)) {
            Session::put("cart", []);
        }

        $book_id = $request->book_id;
        $book_quantity = $request->book_quantity;

        // if the book already exists
        if (array_key_exists($book_id, $cart)) {

            // if it has the same quantity
            if ($cart[$book_id] === $book_quantity) {
                return back()->with("message", "Le livre est déja dans le panier.");
            } else {
                $cart[$book_id] = $book_quantity;
                Session::put("cart", $cart);
                return back()->with("message", "Le livre est déja dans le panier, sa quantité est modifié.");
            }
        }

        $cart[$book_id] = $book_quantity;
        Session::put("cart", $cart);


        return back()->with("message", "Le livre est ajouté au panier.");
    }

    public function create(Request $request)
    {

        $cart = Session::get("cart");

        if (!isset($cart)) {
            Session::put("cart", []);
            $cart = Session::get("cart");
        }

        $book_ids = array_keys($cart);
        // This is to query the books based on their ids, it automatically removes duplicates
        $books = Book::whereIn('id', $book_ids)->get();

        foreach ($books as $book) {
            $book->order_quantity = $cart[$book->id];
        }


        // Calculate the sum of prices
        $totalPrice = 0;

        foreach ($books as $book) {
            $totalPrice =
                $totalPrice + $book->price * $book->order_quantity;
        }

        $coupon = session("coupon");
        $finalPrice = null;
        $coupon_percentage = null;

        if (isset($coupon)) {
            $coupon_percentage = $coupon->percentage;
            $finalPrice = $totalPrice - $totalPrice * $coupon->percentage / 100;
            if ($finalPrice < 0) {
                $finalPrice = 0;
            }

            Session::put("finalPrice", $finalPrice);
        }

        return view("orders.create", compact("books", "totalPrice", "finalPrice", "coupon_percentage"));
    }



    public function store(Request $request)
    {
        $order = new Order();
        // assigning user_id
        $order["user_id"] = auth()->id();


        // assigning coupon_id
        if (Session::has("coupon")) {
            $order["coupon_id"] = Session::get("coupon")->id;
        } else {
            $order["coupon_id"] = null;
        }

        // assinging the adresse
        $order["adresse"] = $request->adresse;

        // assiging the total_price
        $order["total_price"] = "100";

        // assiging the total_price
        $order["status"] = 0;

        // inserting the row in the orders table
        $order->save();

        $cart = Session::get("cart");

        foreach ($cart as $book_id => $order_quantity) {
            $book_order = BookOrder::create(
                [
                    "book_id" => $book_id,
                    "order_id" => $order->id,
                    "quantity" => $order_quantity
                ]
            );
        }


        Session::forget("cart");
        Session::forget("coupon");

        return redirect("/orders")->with("message", "votre commande est faite.");
    }

    public function deleteItemFromCart(Request $request, $id)
    {

        $cart = Session::get("cart");

        if (array_key_exists($id, $cart)) {
            unset($cart[$id]);
            Session::put("cart", $cart);
        }
        // return to the previous page
        return back();
    }
}
