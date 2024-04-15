<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            // "All" => Tab::make("")->label("Tout"),
            "Non confirmée" => Tab::make("")->query(function (Builder $query) {
                $query->where("status", 0);
            })->label("Non confirmée"),
            "Confirmée" => Tab::make("")->query(function (Builder $query) {
                $query->where("status", 1);
            })->label("Confirmée"),
            "Livrée" => Tab::make("")->query(
                function (Builder $query) {
                    $query->where("status", 2);
                }
            )->label("Livrée"),

        ];
    }
}
