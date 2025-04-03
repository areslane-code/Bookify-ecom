<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Log;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'coupon_id' => $this->faker->optional($weight = 0.50)->numberBetween(1, 7),
            'adresse' => $this->faker->address,
            'total_price' => 0,
            'status_id' => $this->faker->numberBetween(1, 4),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }


    public function configure()
    {
        return $this->afterCreating(function (Order $order) {
            // Check if there are enough books in the database
            $bookCount = Book::count();
            if ($bookCount > 0) {
                // Select up to 3 random books
                $bookIds = Book::inRandomOrder()->limit(min(3, $bookCount))->pluck('id')->toArray();

                // Generate random quantities for each book and prepare the array for attach
                $quantities = [];
                foreach ($bookIds as $bookId) {
                    $quantities[$bookId] = ['quantity' => $this->faker->numberBetween(1, 4)];
                }



                // Attach books with quantities to the order
                $order->books()->attach($quantities);

                // Reload the relationship to get the correct sum
                $order->load('books');

                // Calculate the sum of book prices with quantities
                $books_price_sum = 0;
                foreach ($order->books as $book) {
                    $books_price_sum += $book->price * $book->pivot->quantity;
                }


                // Apply coupon discount if applicable
                $coupon = $order->coupon;
                if ($coupon) {
                    $order->total_price = $books_price_sum - ($books_price_sum * $coupon->percentage / 100);
                } else {
                    $order->total_price = $books_price_sum;
                }

                // Save the updated order
                $order->save();
            }
        });
    }
}
