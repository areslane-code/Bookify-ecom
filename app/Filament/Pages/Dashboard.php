<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Pages\Dashboard\Concerns\HasFilters;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Illuminate\Contracts\Support\Htmlable;

class Dashboard extends \Filament\Pages\Dashboard
{
    use HasFiltersForm;

    protected static ?string $title = "Tableau de bord";

    protected static ?string $navigationLabel =  "Tableau de bord";

    public static function canAccess(): bool
    {
        // authorize only admin
        return auth()->user()->role === 2;
    }

    // filters
    public function filtersForm(Form $form)
    {
        return $form->schema([
            Section::make("Filtrer les résultats")->schema([
                Select::make("time")
                    ->options([
                        'last_week' => '7 Jours',
                        'last_month' => '30 Jours',
                        'last_year' => 'Année dernière',
                        'all_time' => 'Tout le temps',
                    ])
                    ->default('last_week')
                    ->label("Période")
                    ->native(false),

            ])
                ->columns(3)
        ]);
    }
}
