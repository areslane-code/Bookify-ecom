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
        for ($i = 0; $i < 100; $i++) {
            DB::table('books')->insert([
                'title' => 'Harry Potter' . ($i + 1),
                'image' => 'book-cover.jpg',
                'author' => 'macan iwan' . ($i + 1),
                'user_id' => rand(2, 7),
                'price' => rand(1000, 2500),
                'quantity' => rand(10, 88),
                'description' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis ullam inventore, at odit eius tempora praesentium ab excepturi adipisci assumenda consequatur optio amet totam debitis, ad, dolorem quisquam repellendus? Nesciunt." . ($i + 1),
            ]);
        }
    }
}
