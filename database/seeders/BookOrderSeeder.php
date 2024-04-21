<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $bookOrders = [
            ['book_id' => 1, 'order_id' => 1, "quantity" => 7],
            ['book_id' => 2, 'order_id' => 3, "quantity" => 3],
            ['book_id' => 3, 'order_id' => 2, "quantity" => 3],
            ['book_id' => 4, 'order_id' => 5, "quantity" => 4],
            ['book_id' => 1, 'order_id' => 4, "quantity" => 3],
            ['book_id' => 2, 'order_id' => 1, "quantity" => 5],
            ['book_id' => 3, 'order_id' => 3, "quantity" => 1],
            ['book_id' => 4, 'order_id' => 2, "quantity" => 2],
            ['book_id' => 1, 'order_id' => 5, "quantity" => 3],
            ['book_id' => 2, 'order_id' => 4, "quantity" => 3]
        ];

        foreach ($bookOrders as $pair) {
            DB::table('book_order')->insert($pair);
        }
    }
}
