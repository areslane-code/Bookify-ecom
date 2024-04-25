<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Coupon;
use App\Models\CouponUser;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $finalPrice = null;

        // coupon

        $coupon = $request->coupon;



        // check if the url has coupon
        if (isset($coupon)) {
            // check if the coupon exists
            $exists_coupon = Coupon::find($coupon);
            if (isset($exists_coupon)) {
                // check if the user used the coupon before
                $checkCouponAlreadyUsed = CouponUser::where('coupon_code', $coupon)
                    ->where('user_id', Auth()->id())
                    ->first();
                if (!isset($checkCouponAlreadyUsed)) {
                    $valid_coupon = $exists_coupon;
                    $finalPrice = $totalPrice - $valid_coupon->percentage * $totalPrice;
                }
            }
        }

        return view("orders.create", compact("books", "totalPrice", "finalPrice"));
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
