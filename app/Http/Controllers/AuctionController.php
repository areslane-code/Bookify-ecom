<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Bid;
use App\Models\Book;
use App\Models\BookOrder;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;

class AuctionController extends Controller
{
    //

    //index function
    public function index()
    {
        $auctions = Auction::where('auction_final_date', '>', now())->get();

        // i want to check if the auctions have at least one bid then show the auctions with the highest
        // auction else show the auction with the minimum amount

        foreach ($auctions as $auction) {
            if ($auction->bids()->count() > 0) {
                $auction->highest_bid = $auction->bids()->max('amount');
            } else {
                $auction->highest_bid = $auction->min_bid_amount;
            }
        }

        return view('auctions.index', compact('auctions'));
    }

    // show

    public function show($id)
    {
        $auction = Auction::find($id);


        $bids = $auction->bids()
            ->orderBy('amount', 'desc')
            ->cursorPaginate(3);

        if ($auction->bids()->count() > 0) {
            $auction->highest_bid = $auction->bids()->max('amount');
        } else {
            $auction->highest_bid = $auction->min_bid_amount;
        }


        return view('auctions.show', compact('auction', 'bids'));
    }


    public function create(Request $request)
    {


        $auction = Auction::find($request->bid_id);

        $bid = Bid::where('user_id', auth()->user()->id)->first();


        if ($bid != null) {
            $bid->update([
                'amount' => $request->bid_amount,
            ]);
        } else {

            $auction->bids()->create([
                'user_id' => auth()->user()->id,
                'bid_id' => $request->bid_id,
                'amount' => $request->bid_amount,
            ]);
        }


        return redirect()->back();;
    }

    public function PaymentForm($id)
    {
        $auction = Auction::find($id);

        return view('auctions.payment-form', compact('auction'));
    }



    public function test(Request $request)
    {
        $request->flash();

        $auction_id = $request->auction_id;
        $auction = Auction::find($auction_id);

        $auction_adresse = $request->adresse;

        Session::put('auction_id', $auction_id);
        Session::put('auction_adresse', $auction_adresse);




        try {
            Stripe::setApiKey(config('stripe.test.sk') ?? env('STRIPE_TEST_SK'));

            $session = \Stripe\Checkout\Session::create([
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'DZD',
                            'product_data' => [
                                'name' => $auction->book->title,
                            ],
                            'unit_amount' =>  $auction->winning_price * 100,
                        ],
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
                'success_url' => url('/auction/payment-success'),
                'cancel_url' => url("/auction/{$auction_id}/payment-form"),
            ]);

            return redirect()->away($session->url);
        } catch (ApiErrorException $e) {
            Session::forget(['auction_id', 'auction_adresse']);
            return back()->with('error', 'Payment failed: ' . $e->getMessage());
        } catch (\Exception $e) {
            Session::forget(['auction_id', 'auction_adresse']);
            return back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function paymentSuccess(Request $request)
    {

        $auction_id = Session::get('auction_id');

        $auction_adresse = Session::get('auction_adresse');

        $auction = Auction::find($auction_id);

        $order = new Order();
        $order->user_id = auth()->id();
        $order->total_price = $auction->winning_price;
        $order->status_id = 1;
        $order->adresse = $auction_adresse;


        $book = Book::find($auction->book->id);
        $book->quantity -= 1;

        $order->save();

        $auction->status = 'payed';
        $auction->save();

        $book->save();

        BookOrder::create([
            "book_id" => $auction->book->id,
            "order_id" => $order->id,
            "quantity" => 1,
        ]);



        Session::forget(['auction_id', 'auction_adresse']);

        return redirect("/orders")->with("message", "Votre commande est faite.");
    }
}
