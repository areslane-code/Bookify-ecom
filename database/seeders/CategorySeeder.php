<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {
        $categories = [
            'Electronics',
            'Clothing',
            'Books',
            'Home & Garden',
            'Sports & Outdoors',
            'Health & Beauty',
            'Toys & Games',
            'Food & Beverages',
            'Automotive',
            'Travel & Leisure'
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                "name" => $category
            ]);
        }
    }
}
