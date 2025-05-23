<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Book;
use App\Models\BookOrder;
use App\Models\Coupon;
use App\Models\CouponUser;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;

class OrderController extends Controller
{
    //SHOW METHODS

    public function index()
    {
        // select orders that belong to the user
        $orders = Order::with("user", "books", "coupon")->where("user_id", auth()->id())->get();
        // select auctions that the user won and status is completed
        $user_auctions = Auction::where(["winner_id" => auth()->id(), "status" => 'completed'], auth()->id())->get();




        return view("orders.index", compact("orders", "user_auctions"));
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
                return back()->with("message", "Le quantité de livre est modifiée.");
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

            $order->delete();
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



    public function test(Request $request)
    {
        // Store form data in session
        $request->flash(); // Keep old input for form repopulation if needed
        session(['adresse' => $request->input('adresse')]); // Store adresse explicitly
        $cart = Session::get("cart");
        session(['cart' => $cart]); // Ensure cart is stored in session

        // Retrieve coupon from session

        $coupon = Session::get("coupon");


        try {
            Stripe::setApiKey(config('stripe.test.sk') ?? env('STRIPE_TEST_SK'));

            $lineItems = [];
            foreach ($cart as $book_id => $order_quantity) {
                $book = Book::find($book_id);

                $lineItems[] = [
                    'price_data' => [
                        'currency' => 'DZD',
                        'product_data' => [
                            'name' => $book->title,
                        ],
                        'unit_amount' => ($coupon != null) ?
                            ($book->price - $book->price * $coupon->percentage / 100) * 100
                            : $book->price * 100,
                    ],
                    'quantity' => $order_quantity,
                ];
            }

            $session = \Stripe\Checkout\Session::create([
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => url('/order/payment-success'),
                'cancel_url' => url('/orders/create'),
            ]);

            return redirect()->away($session->url);
        } catch (ApiErrorException $e) {
            return back()->with('error', 'Payment failed: ' . $e->getMessage());
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred. Please try again.');
        }
    }




    public function paymentSuccess(Request $request)
    {

        $order = new Order();
        $order->user_id = auth()->id();

        // Retrieve coupon from session
        if (Session::has("coupon")) {
            $order->coupon_id = Session::get("coupon")->id;
        } else {
            $order->coupon_id = null;
        }

        // Retrieve adresse from session
        $order->adresse = session('adresse');

        // Retrieve cart from session
        $cart = session('cart');
        if (!$cart) {
            return redirect('/orders')->with('error', 'Cart is empty or session expired.');
        }

        // Calculate total price
        $books = Book::whereIn('id', array_keys($cart))->get();
        $totalPrice = 0;
        foreach ($books as $book) {
            $totalPrice += $book->price * $cart[$book->id];
        }

        $coupon = session("coupon");
        $finalPrice = $totalPrice;
        if ($coupon) {
            $finalPrice = $totalPrice - ($totalPrice * $coupon->percentage / 100);
            if ($finalPrice < 0) {
                $finalPrice = 0;
            }
        }

        $order->total_price = $finalPrice;
        $order->status_id = 1;

        // Save the order
        $order->save();

        // Create BookOrder entries
        foreach ($cart as $book_id => $order_quantity) {
            BookOrder::create([
                "book_id" => $book_id,
                "order_id" => $order->id,
                "quantity" => $order_quantity,
            ]);

            // Update book quantity
            $book = Book::find($book_id);
            $book->quantity -= $order_quantity;
            $book->save();
        }

        // Clear session data
        Session::forget(['cart', 'coupon', 'adresse', 'finalPrice']);

        return redirect("/orders")->with("message", "Votre commande est faite.");
    }


    public function printInvoice(Request $request)
    {
        $order_id = $request->order_id;
        $record = Order::find($order_id);
        $recordDate    = $record->created_at;
        $client     = $record->user->lastname . " " .  $record->user->firstname;
        $fileName       = "facture{$recordDate}_{$client}.pdf";
        $initialprice = 0;
        foreach ($record->books as $book) {
            $initialprice = $initialprice + $book->price * $book->pivot->quantity;
        }
        $pdf            = Pdf::loadView('print', compact('record', 'fileName', "client", "initialprice"));

        return response()->streamDownload(fn() => print($pdf->output()), $fileName);
    }
}
