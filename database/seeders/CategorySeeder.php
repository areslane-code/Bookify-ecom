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
            'Roman',
            'Science-fiction',
            'Policier & Thriller',
            'Fantasy',
            'Jeunesse',
            'Biographie',
            'Poésie',
            'BD & Comics',
            'Art & Photographie',
            'Sciences & Techniques'
        ];



        foreach ($categories as $category) {
            DB::table('categories')->insert([
                "name" => $category
            ]);
        }
    }
}
