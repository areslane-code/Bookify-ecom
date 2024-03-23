<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $bookReviews = [
            ['user_id' => 1, 'book_id' => 1, 'content' => 'This book is amazing! Highly recommended.'],
            ['user_id' => 2, 'book_id' => 3, 'content' => 'A must-read for anyone interested in the topic.'],
            ['user_id' => 3, 'book_id' => 2, 'content' => 'I found this book very informative and well-written.'],
            ['user_id' => 1, 'book_id' => 4, 'content' => 'Disappointing, not what I expected.'],
            ['user_id' => 4, 'book_id' => 5, 'content' => 'Couldn\'t put it down, excellent read!'],
            ['user_id' => 2, 'book_id' => 1, 'content' => 'One of my all-time favorite books.'],
            ['user_id' => 3, 'book_id' => 3, 'content' => 'I wish I had read this book sooner.'],
            ['user_id' => 4, 'book_id' => 2, 'content' => 'Great insights, definitely worth reading.'],
            ['user_id' => 1, 'book_id' => 5, 'content' => 'The characters felt so real, fantastic storytelling.'],
            ['user_id' => 2, 'book_id' => 4, 'content' => 'Not my cup of tea, but others might enjoy it.']
        ];

        foreach ($bookReviews as $review) {
            DB::table('reviews')->insert($review);
        }
        //
    }
}
