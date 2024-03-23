<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouponOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $couponOrders = [
            ['order_id' => 1, 'coupon_id' => 1],
            ['order_id' => 2, 'coupon_id' => 3],
            ['order_id' => 3, 'coupon_id' => 2],
            ['order_id' => 4, 'coupon_id' => 5],
            ['order_id' => 1, 'coupon_id' => 4],
            ['order_id' => 2, 'coupon_id' => 1],
            ['order_id' => 3, 'coupon_id' => 3],
            ['order_id' => 4, 'coupon_id' => 2],
            ['order_id' => 1, 'coupon_id' => 5],
            ['order_id' => 2, 'coupon_id' => 4]
        ];

        foreach ($couponOrders as $pair) {
            DB::table('coupon_order')->insert($pair);
        }
    }
}
