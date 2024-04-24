<?php

namespace Database\Seeders;

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
        //
        $orders = [
            ['user_id' => 5, 'adresse' => '123 Main Street', 'total_quantity' => 3, 'total_price' => '50.00', 'created_at' => '2024-03-16 10:00:00', "status" => 0, "coupon_code" => "code10"],
            ['user_id' => 2, 'adresse' => '456 Elm Street', 'total_quantity' => 2, 'total_price' => '30.00', 'created_at' => '2024-03-16 11:30:00', "status" => 0, "coupon_code" => "code10"],
            ['user_id' => 3, 'adresse' => '789 Oak Street', 'total_quantity' => 1, 'total_price' => '20.00', 'created_at' => '2024-03-17 09:45:00', "status" => 0, "coupon_code" => "code10"],
            ['user_id' => 4, 'adresse' => '321 Pine Street', 'total_quantity' => 4, 'total_price' => '65.00', 'created_at' => '2024-03-17 14:20:00', "status" => 0, "coupon_code" => "code10"],
            ['user_id' => 1, 'adresse' => '555 Maple Street', 'total_quantity' => 2, 'total_price' => '40.00', 'created_at' => '2024-03-18 08:15:00', "status" => 2],
            ['user_id' => 2, 'adresse' => '777 Cedar Street', 'total_quantity' => 5, 'total_price' => '75.00', 'created_at' => '2024-03-19 16:30:00', "status" => 0, "coupon_code" => "code10"],
            ['user_id' => 3, 'adresse' => '888 Birch Street', 'total_quantity' => 2, 'total_price' => '35.00', 'created_at' => '2024-03-20 11:10:00', "status" => 2, "coupon_code" => "code10"],
            ['user_id' => 4, 'adresse' => '999 Walnut Street', 'total_quantity' => 3, 'total_price' => '55.00', 'created_at' => '2024-03-21 09:00:00', "status" => 0, "coupon_code" => "code10"],
            ['user_id' => 1, 'adresse' => '1010 Oakwood Street', 'total_quantity' => 1, 'total_price' => '15.00', 'created_at' => '2024-03-22 13:45:00', "status" => 0, "coupon_code" => "code10"],
            ['user_id' => 2, 'adresse' => '1111 Pinehurst Street', 'total_quantity' => 6, 'total_price' => '90.00', 'created_at' => '2024-03-23 14:55:00', "status" => 2, "coupon_code" => "code10"],
            ['user_id' => 1, 'adresse' => '555 Maple Street', 'total_quantity' => 2, 'total_price' => '40.00', 'created_at' => '2024-06-18 08:15:00', "status" => 0, "coupon_code" => "code10"],
            ['user_id' => 2, 'adresse' => '777 Cedar Street', 'total_quantity' => 5, 'total_price' => '75.00', 'created_at' => '2024-05-19 16:30:00', "status" => 1, "coupon_code" => "code10"],
            ['user_id' => 3, 'adresse' => '888 Birch Street', 'total_quantity' => 2, 'total_price' => '35.00', 'created_at' => '2024-03-20 11:10:00', "status" => 2, "coupon_code" => "code10"],
            ['user_id' => 4, 'adresse' => '999 Walnut Street', 'total_quantity' => 3, 'total_price' => '55.00', 'created_at' => '2024-02-21 09:00:00', "status" => 0, "coupon_code" => "code10"],
            ['user_id' => 1, 'adresse' => '1010 Oakwood Street', 'total_quantity' => 1, 'total_price' => '15.00', 'created_at' => '2024-09-22 13:45:00', "status" => 1, "coupon_code" => "code10"],
            ['user_id' => 2, 'adresse' => '1111 Pinehurst Street', 'total_quantity' => 6, 'total_price' => '90.00', 'created_at' => '2024-08-23 14:55:00', "status" => 0, "coupon_code" => "code10"]
        ];
        foreach ($orders as $order) {
            DB::table('orders')->insert($order);
        }
    }
}
