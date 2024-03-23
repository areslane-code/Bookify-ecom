<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouponUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $userCoupons = [
            ['user_id' => 1, 'coupon_id' => 1],
            ['user_id' => 2, 'coupon_id' => 3],
            ['user_id' => 3, 'coupon_id' => 2],
            ['user_id' => 4, 'coupon_id' => 5],
            ['user_id' => 1, 'coupon_id' => 4],
            ['user_id' => 2, 'coupon_id' => 1],
            ['user_id' => 3, 'coupon_id' => 3],
            ['user_id' => 4, 'coupon_id' => 2],
            ['user_id' => 1, 'coupon_id' => 5],
            ['user_id' => 2, 'coupon_id' => 4]
        ];

        foreach ($userCoupons as $pair) {
            DB::table('coupon_user')->insert($pair);
        }
    }
}
