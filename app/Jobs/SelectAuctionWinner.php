<?php

namespace App\Jobs;

use App\Models\Auction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SelectAuctionWinner implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $auction_id;

    /**
     * Create a new job instance.
     */
    public function __construct($auction_id)
    {
        $this->auction_id = $auction_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $auction = Auction::find($this->auction_id);

        if ($auction == null) {
            return;
        }

        // Select the highest bid
        $winningBid = $auction->bids()
            ->orderByDesc('amount')
            ->first();


        if ($winningBid != null) {
            $auction->update([
                'winner_id' => $winningBid->user_id,
                'winning_price' => $winningBid->amount,
                'status' => 'completed',
            ]);
        } else {
            $auction->update([
                'status' => 'expired',
            ]);
        }
    }
}
