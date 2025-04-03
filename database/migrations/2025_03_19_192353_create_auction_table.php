<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('auctions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("book_id")->constrained("books")->cascadeOnDelete();
            $table->double("min_bid_amount");
            $table->dateTime("auction_final_date");
            $table->foreignId("winner_id")->nullable()->constrained("users")->nullOnDelete();
            $table->double("winning_price")->nullable();
            $table->enum('status', ['active', 'completed', 'expired', 'payed'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auctions');
    }
};
