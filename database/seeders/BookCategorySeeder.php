<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bookCategories = [
            ['book_id' => 1, 'category_id' => 1],
            ['book_id' => 2, 'category_id' => 3],
            ['book_id' => 3, 'category_id' => 2],
            ['book_id' => 4, 'category_id' => 5],
            ['book_id' => 1, 'category_id' => 4],
            ['book_id' => 2, 'category_id' => 1],
            ['book_id' => 3, 'category_id' => 3],
            ['book_id' => 4, 'category_id' => 2],
            ['book_id' => 1, 'category_id' => 5],
            ['book_id' => 2, 'category_id' => 4]
        ];

        foreach ($bookCategories as $pair) {
            DB::table('book_category')->insert($pair);
        }
    }
}
