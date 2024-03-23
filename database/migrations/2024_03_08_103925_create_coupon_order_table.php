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
        Schema::create('coupon_order', function (Blueprint $table) {
            $table->foreignId("order_id")->constrained("orders")->cascadeOnDelete();
            $table->foreignId("coupon_id")->constrained("coupons")->cascadeOnDelete();
            $table->primary(['coupon_id', 'order_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon_order');
    }
};
