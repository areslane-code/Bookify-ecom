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
        Schema::create('coupon_user', function (Blueprint $table) {
            $table->foreignId("user_id")->constrained("users")->cascadeOnDelete();
            $table->string("coupon_code"); // Same data type as the primary key in coupons table
            $table->foreign('coupon_code')->references('code')->on('coupons')->cascadeOnDelete();
            $table->primary(['user_id', 'coupon_code']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon_user');
    }
};
