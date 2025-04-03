<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('order_statuses')->insert([
            "status" => "en cours de préparation"
        ]);
        DB::table('order_statuses')->insert([
            "status" => "en cours de livraison"
        ]);
        DB::table('order_statuses')->insert([
            "status" => "livrée"
        ]);
        DB::table('order_statuses')->insert([
            "status" => "retournée"
        ]);
    }
}
