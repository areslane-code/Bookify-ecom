<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    use HasFactory;

    protected $table = 'auctions';

    // relationship hasMany Bids

    public function bids()
    {
        return $this->hasMany(Bid::class);
    }

    // relationship belongsTo book

    public function book()
    {
        return $this->belongsTo(Book::class);
    }


    protected $fillable = [
        'book_id',
        'min_bid_amount',
        'auction_final_date',
        'status',
        'winner_id',
        'winning_price',
    ];
}
