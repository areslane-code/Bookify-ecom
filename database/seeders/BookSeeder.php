<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('books')->insert([
                'title' => 'title' . ($i + 1),
                'image' => 'image/' . ($i + 1),
                'author' => 'author' . ($i + 1),
                'user_id' => rand(2, 10),
                'price' => rand(2, 9),
                'quantity' => rand(10, 88),
                'description' => "description" . ($i + 1),
            ]);
        }
    }
}
