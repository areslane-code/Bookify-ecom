<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\CouponUser;
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

    public function create(Request $request)
    {
        $cartCookie = $_COOKIE['cart'];
        $cartCookie = str_replace(['[', ']'], '', $cartCookie);
        $book_ids = explode(',', $cartCookie);
        // This is to query the books based on their ids, it automatically removes duplicates
        $books = Book::whereIn('id', $book_ids)->get();
        // Calculate the sum of prices
        $totalPrice = $books->sum('price');

        // coupon

        $coupon = $request->coupon;

        if (isset($coupon)) {
            $checkCouponAlreadyUsed = CouponUser::where('coupon_id', $coupon)
                ->where('user_id', auth()->id)
                ->first();
        }

        return view("orders.create", compact("books", "totalPrice"));
    }

    public function deleteItemFromCart(Request $request, $id)
    {
        $cartCookie = $_COOKIE['cart'];
        $cartCookie = str_replace(['[', ']'], '', $cartCookie);
        $book_ids = explode(',', $cartCookie);

        $valueToRemove = $id;

        // Search for the value in the array
        $key = array_search($valueToRemove, $book_ids);

        // If the value is found, remove it
        if ($key !== false) {
            unset($book_ids[$key]);
        }

        // Retrieve the expiration date from the existing cookie
        $expiration = isset($_COOKIE['cart_expire']) ? $_COOKIE['cart_expire'] : null;

        // Set the updated cookie with the new array and the same expiration date
        $newCookieValue = '[' . implode(',', $book_ids) . ']';
        if ($expiration !== null) {
            setcookie('cart', $newCookieValue, $expiration, "/");
        } else {
            // Set default expiration (e.g., 30 days)
            setcookie('cart', $newCookieValue, time() + (86400 * 30), "/");
        }

        // return to the previous page
        return back();
    }
}
