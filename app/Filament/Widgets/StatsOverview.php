<?php

namespace App\Filament\Widgets;

use App\Models\Book;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Flowframe\Trend\Trend;

class StatsOverview extends BaseWidget
{

    use InteractsWithPageFilters;

    protected static ?int $sort = 1;

    protected function getStats(): array
    {

        $filter = $this->filters["time"];
        $user_count = 0;
        $book_count = 0;
        $order_count = 0;
        $order_sum = 0;

        if ($filter === "last_week") {
            $user_count = User::whereBetween('created_at', [now()->subWeek(), now()])->count();
            $book_count = Book::whereBetween('created_at', [now()->subWeek(), now()])->count();
            $order_count = Order::whereBetween('created_at', [now()->subWeek(), now()])->count();
            $order_sum = Order::whereBetween('created_at', [now()->subWeek(), now()])->where("status_id", 5)->sum('total_price');
        } else if ($filter === "last_month") {
            $user_count = User::whereBetween('created_at', [now()->subMonth(), now()])->count();
            $book_count = Book::whereBetween('created_at', [now()->subMonth(), now()])->count();
            $order_count = Order::whereBetween('created_at', [now()->subMonth(), now()])->count();
            $order_sum = Order::whereBetween('created_at', [now()->subMonth(), now()])->where("status_id", 5)->sum('total_price');
        } else if ($filter === "last_year") {
            $user_count = User::whereBetween('created_at', [now()->subYear(), now()])->count();
            $book_count = Book::whereBetween('created_at', [now()->subYear(), now()])->count();
            $order_count = Order::whereBetween('created_at', [now()->subYear(), now()])->count();
            $order_sum = Order::whereBetween('created_at', [now()->subYear(), now()])->where("status_id", 5)->sum('total_price');
        } else {
            $user_count = User::count();
            $book_count = Book::count();
            $order_count = Order::count();
            $order_sum = Order::where("status_id", 5)->sum('total_price');
        }

        return [
            Stat::make("Utilisateurs", $user_count)
                ->description("le nombre d'utilisateurs total")
                ->descriptionIcon('heroicon-o-user-group'),
            Stat::make("Livres", $book_count)
                ->description("le nombre de livre total")
                ->descriptionIcon('heroicon-o-book-open'),
            Stat::make("Commandes", $order_count)
                ->description("le nombre de commande total")
                ->descriptionIcon('heroicon-o-shopping-cart'),
            Stat::make(
                "Revenue Total",
                $order_sum . " " . "DA"
            )
                ->description("le revenue total")
                ->descriptionIcon('heroicon-o-banknotes'),
        ];
    }
}
