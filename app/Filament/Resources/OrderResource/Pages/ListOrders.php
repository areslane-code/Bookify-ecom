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


    public function getTabs(): array
    {
        return [
            "tout" => Tab::make("")
                ->label("Toutes les commandes"),

            "nouvelles commandes" => Tab::make()->query(function (Builder $query) {
                $query->where("status_id", 1);
            })
                ->label("Nouvelles"),

            "confirmée" => Tab::make("")->query(function (Builder $query) {
                $query->where("status_id", 2);
            })
                ->label("Confirmées"),

            "en cours de préparation" => Tab::make()->query(
                function (Builder $query) {
                    $query->where("status_id", 3);
                }
            )
                ->label("En cours de préparation"),

            "en cours de livraison" => Tab::make()->query(function (Builder $query) {
                $query->where("status_id", 4);
            })
                ->label("En cours de livraison"),

            "livrée" => Tab::make()->query(function (Builder $query) {
                $query->where("status_id", 5);
            })
                ->label("Livrées"),

            "retournée" => Tab::make()->query(function (Builder $query) {
                $query->where("status_id", 6);
            })
                ->label("Retournées"),

            "annulée" => Tab::make()->query(function (Builder $query) {
                $query->where("status_id", 7);
            })
                ->label("Annulées"),
        ];
    }
}
