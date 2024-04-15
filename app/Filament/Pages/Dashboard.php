<?php

namespace App\Filament\Pages;

use Illuminate\Contracts\Support\Htmlable;

class Dashboard extends \Filament\Pages\Dashboard
{
    // ...


    protected static ?string $title = "Tableau de bord";

    protected static ?string $navigationLabel =  "Tableau de bord";

    public static function canAccess(): bool
    {
        // authorize only admin
        return auth()->user()->role === 2;
    }
}
