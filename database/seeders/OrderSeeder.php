<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();
        //
        $orders = [
            ['user_id' => 5, 'adresse' => '123 Main Street',   'total_price' => '50.00',     "coupon_id" => 3, "status_id" => 1,    "created_at" => $now, "updated_at" => $now,],
            ['user_id' => 2, 'adresse' => '456 Elm Street',    'total_price' => '30.00',     "coupon_id" => 7, "status_id" => 1,    "created_at" => $now, "updated_at" => $now,],
            ['user_id' => 3, 'adresse' => '789 Oak Street',    'total_price' => '20.00',     "coupon_id" => 3, "status_id" => 1,    "created_at" => $now, "updated_at" => $now,],
            ['user_id' => 4, 'adresse' => '321 Pine Street',    'total_price' => '65.00',     "coupon_id" => 4, "status_id" => 1,    "created_at" => $now, "updated_at" => $now,],
            ['user_id' => 1, 'adresse' => '555 Maple Street',    'total_price' => '40.00',     "status_id" => 1,    "created_at" => $now, "updated_at" => $now,],
            ['user_id' => 2, 'adresse' => '777 Cedar Street',    'total_price' => '75.00',     "coupon_id" => 6, "status_id" => 1,    "created_at" => $now, "updated_at" => $now,],
            ['user_id' => 3, 'adresse' => '888 Birch Street',    'total_price' => '35.00',     "coupon_id" => 5, "status_id" => 1,    "created_at" => $now, "updated_at" => $now,],
            ['user_id' => 4, 'adresse' => '999 Walnut Street',   'total_price' => '55.00',     "coupon_id" => 3, "status_id" => 1,    "created_at" => $now, "updated_at" => $now,],
            ['user_id' => 1, 'adresse' => '1010 Oakwood Street',    'total_price' => '15.00',     "coupon_id" => 3, "status_id" => 1,    "created_at" => $now, "updated_at" => $now,],
            ['user_id' => 2, 'adresse' => '1111 Pinehurst Street',    'total_price' => '90.00',     "coupon_id" => 3, "status_id" => 1,    "created_at" => $now, "updated_at" => $now,],
            ['user_id' => 1, 'adresse' => '555 Maple Street',    'total_price' => '40.00',     "coupon_id" => 3, "status_id" => 1,    "created_at" => $now, "updated_at" => $now,],
            ['user_id' => 2, 'adresse' => '777 Cedar Street',    'total_price' => '75.00',     "coupon_id" => 6, "status_id" => 1,    "created_at" => $now, "updated_at" => $now,],
            ['user_id' => 3, 'adresse' => '888 Birch Street',    'total_price' => '35.00',     "coupon_id" => 3, "status_id" => 1,    "created_at" => $now, "updated_at" => $now,],
            ['user_id' => 4, 'adresse' => '999 Walnut Street',   'total_price' => '55.00',     "coupon_id" => 1, "status_id" => 1,    "created_at" => $now, "updated_at" => $now,],
            ['user_id' => 1, 'adresse' => '1010 Oakwood Street',    'total_price' => '15.00',     "coupon_id" => 2, "status_id" => 1,    "created_at" => $now, "updated_at" => $now,],
            ['user_id' => 2, 'adresse' => '1111 Pinehurst Street',    'total_price' => '90.00',     "coupon_id" => 4, "status_id" => 1,    "created_at" => $now, "updated_at" => $now,]
        ];

        Order::factory()->count(60)->create();

        // foreach ($orders as $order) {
        //     DB::table('orders')->insert($order);
        // }


    }
}
