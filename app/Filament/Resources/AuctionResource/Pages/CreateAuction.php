<?php

namespace App\Filament\Resources\AuctionResource\Pages;

use App\Filament\Resources\AuctionResource;
use App\Jobs\SelectAuctionWinner;
use Carbon\Carbon;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAuction extends CreateRecord
{
    protected static string $resource = AuctionResource::class;


    protected function afterCreate(): void
    {
        // Retrieve the created auction
        $auction = $this->record;

        // Calculate the delay until the auction_final_date
        $delayInSeconds = max(0, Carbon::parse($auction->auction_final_date)->diffInSeconds(now()));


        // Dispatch the SelectBidWinner job with a delay until the auction_final_date
        SelectAuctionWinner::dispatch($auction->id)
            ->delay($delayInSeconds);
    }
}
