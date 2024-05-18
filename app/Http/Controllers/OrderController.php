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
    //SHOW METHODS

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
            $cart = [];
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

    // CREATE METHODS

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
        }

        $finalPrice === null ?
            Session::put("finalPrice", $totalPrice) :
            Session::put("finalPrice", $finalPrice);



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
        $order["total_price"] = Session::get("finalPrice");

        // assiging the total_price
        $order["status_id"] = 1;

        // inserting the row in the orders table
        $order->save();

        $cart = Session::get("cart");

        foreach ($cart as $book_id => $order_quantity) {
            // creating the rows in BookOrder
            $book_order = BookOrder::create(
                [
                    "book_id" => $book_id,
                    "order_id" => $order->id,
                    "quantity" => $order_quantity
                ]
            );
        }

        foreach ($cart as $book_id => $order_quantity) {
            // substracting the ordered quantity from the total quantity of the book
            $book = Book::find($book_id);
            $book->quantity = $book->quantity - $order_quantity;
            $book->save();
        }


        Session::forget("cart");
        Session::forget("coupon");

        return redirect("/orders")->with("message", "votre commande est faite.");
    }


    // UPDATE METHODS

    public function edit(Request $request, $id)
    {
        $order = Order::find($id);
        $books = $order->books;

        // calculate the sum of prices
        $totalPrice = 0;
        foreach ($books as $book) {
            $totalPrice =
                $totalPrice + $book->price * $book->pivot->quantity;
        }

        //
        $coupon = $order->coupon;
        $finalPrice = null;

        $coupon_percentage = null;

        if (isset($coupon)) {
            $coupon_percentage = $coupon->percentage;
            $finalPrice = $totalPrice - $totalPrice * $coupon->percentage / 100;
            if ($finalPrice < 0) {
                $finalPrice = 0;
            }
        }

        $order_id = $id;
        $adresse = $order->adresse;

        return view("orders.edit", compact("books", "totalPrice", "finalPrice", "coupon_percentage", "adresse", "order"));
    }

    public function update(Request $request)

    {
        $removeSubmit = $request->removeSubmit;
        $updateSubmit = $request->updateSubmit;
        $order_id = $request->order_id;
        $order = Order::find($order_id);


        if (isset($removeSubmit)) {

            $bookId = $removeSubmit; // Assuming you have a hidden input field for the book ID

            // Find the book in the order's books relation
            $book = $order->books()->wherePivot('book_id', $bookId)->first();

            if ($book) {
                // Get the quantity of the book in the pivot table
                $pivotQuantity = $book->pivot->quantity;

                // Update the book's quantity in the book table
                $book->quantity += $pivotQuantity;
                $book->save();

                // Detach the book from the order (remove it from the pivot table)
                $order->books()->detach($bookId);

                if ($order->books()->count() === 0) {
                    $order->delete(); // Delete the order if there are no books left

                    return redirect("/orders");
                }

                // recalculate the price

                // calculate the sum of prices
                $books = $order->books;

                $totalPrice = 0;

                foreach ($books as $book) {
                    $totalPrice =
                        $totalPrice + $book->price * $book->pivot->quantity;
                }


                $coupon = $order->coupon;
                $finalPrice = null;

                if (isset($coupon)) {
                    $finalPrice = $totalPrice - $totalPrice * $coupon->percentage / 100;
                    if ($finalPrice < 0) {
                        $finalPrice = 0;
                    }
                    $order->total_price = $finalPrice;
                } else {
                    $order->total_price = $totalPrice;
                }

                // save changes to the order object
                $order->save();



                // if there still are some books
                return back();
            }
        } else  if (isset($updateSubmit)) {

            // Iterate over the request input fields that match the quantityInput_* pattern
            foreach ($request->all() as $key => $value) {
                if (preg_match('/^quantityInput_(\d+)$/', $key, $matches)) {
                    $bookId = $matches[1];
                    $newQuantity = $value;

                    // Find the book in the order's books relation
                    $book = $order->books()->wherePivot('book_id', $bookId)->first();

                    if ($book) {
                        $book->quantity = $book->quantity + ($book->pivot->quantity - $newQuantity);
                        $book->save();
                        // Update the quantity of the book in the pivot table
                        $book->pivot->quantity = $newQuantity;
                        $book->pivot->save();
                    }
                }
            }

            $adresse = $request->adresse;

            if (isset($adresse)) {
                $order->adresse = $adresse;
            }

            // calculate the sum of prices
            $books = $order->books;

            $totalPrice = 0;

            foreach ($books as $book) {
                $totalPrice =
                    $totalPrice + $book->price * $book->pivot->quantity;
            }


            $coupon = $order->coupon;
            $finalPrice = null;

            if (isset($coupon)) {
                $finalPrice = $totalPrice - $totalPrice * $coupon->percentage / 100;
                if ($finalPrice < 0) {
                    $finalPrice = 0;
                }
                $order->total_price = $finalPrice;
            } else {
                $order->total_price = $totalPrice;
            }

            // save changes to the order object
            $order->save();

            return back();
        }
    }

    // Cancel order

    public function cancel(Request $request)
    {
        $id = $request->order_id;
        $order = Order::find($id);
        if (isset($order)) {
            $books = $order->books;

            foreach ($books as $book) {
                if ($book) {
                    // Get the quantity of the book in the pivot table
                    $pivotQuantity = $book->pivot->quantity;

                    // Update the book's quantity in the book table
                    $book->quantity += $pivotQuantity;
                    $book->save();

                    // Detach the book from the order (remove it from the pivot table)
                    $order->books()->detach($book->id);
                }
            }

            $order->status_id = 7;
            $order->save();
        }

        return redirect("/orders");
    }

    // DELETE METHODS
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
