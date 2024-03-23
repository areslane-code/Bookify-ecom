<?php

namespace App\Filament\Widgets;

use App\Models\Book;
use App\Models\Order;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{

    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make("Utilisateurs", User::count())
                ->description("le nombre d'utilisateurs total")
                ->descriptionIcon('heroicon-o-user-group'),
            Stat::make("Livres", Book::count())
                ->description("le nombre de livre total")
                ->descriptionIcon('heroicon-o-book-open'),
            Stat::make("Commandes", Order::count())
                ->description("le nombre de commande total")
                ->descriptionIcon('heroicon-o-shopping-cart'),
            Stat::make(
                "Revenue de ce mois",
                Order::sum("total_price") . " " . "DA"
            )
                ->description("le revenue total de ce mois")
                ->descriptionIcon('heroicon-o-banknotes'),
        ];
    }
}
