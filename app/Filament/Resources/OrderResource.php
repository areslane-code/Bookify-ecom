<?php

namespace App\Filament\Resources;


use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Filament\Resources\OrderResource\RelationManagers\BooksRelationManager as OrderBooksRelationManager;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists;
use Filament\Infolists\Components\KeyValueEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Support\Enums\FontWeight;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationLabel = "Commandes";

    protected static ?string $modelLabel = "Commandes";


    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?int $navigationSort = 2;



    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.lastname')
                    ->label("Nom"),
                Tables\Columns\TextColumn::make('user.firstname')
                    ->label("Prénom"),
                Tables\Columns\TextColumn::make('adresse')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total_price')
                    ->label("Prix total"),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label("Date de commande"),
                Tables\Columns\TextColumn::make("status.status")
                    ->badge()
                    ->color(function ($state) {
                        if ($state === "annulée" || $state === "retournée") {
                            return "danger";
                        } else if ($state === "livrée") {
                            return "success";
                        } elseif ($state === "en attente de confirmation") {
                            return "blue";
                        } else {
                            return "purple";
                        }
                    })
                    ->label("État")
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make(
                    [
                        // confirm order action
                        Tables\Actions\Action::make("Confirmer la commande")
                            ->action(function (Order $record) {
                                $record->status_id = 2;
                                $record->save();
                            })
                            ->icon("heroicon-s-check")

                            ->requiresConfirmation(),
                        // preparing order action
                        Tables\Actions\Action::make("Preparer la commande")
                            ->action(function (Order $record) {
                                $record->status_id = 3;
                                $record->save();
                            })
                            ->icon("heroicon-o-shopping-bag")
                            ->requiresConfirmation(),
                        // starting shipment process action
                        Tables\Actions\Action::make("Passer a la livraison")
                            ->action(function (Order $record) {
                                $record->status_id = 4;
                                $record->save();
                            })
                            ->icon("heroicon-o-rocket-launch")
                            ->requiresConfirmation(),
                        // confirm shipment action
                        Tables\Actions\Action::make("Confirmer la livraison")
                            ->action(function (Order $record) {
                                $record->status_id = 5;
                                $record->save();
                            })
                            ->icon("heroicon-s-check-circle")
                            ->requiresConfirmation(),
                        // order is returned action
                        Tables\Actions\Action::make("Commande retournée")
                            ->action(function (Order $record) {
                                $record->status_id = 6;
                                $record->save();
                            })
                            ->icon("heroicon-o-arrow-uturn-left")
                            ->requiresConfirmation(),
                        // cancel order action
                        Tables\Actions\Action::make("Annuler")
                            ->action(function (Order $record) {
                                $record->status_id = 7;
                                $record->save();
                            })
                            ->icon("heroicon-o-x-mark")
                            ->requiresConfirmation(),
                    ]
                )->hidden(
                    function (Order $record) {
                        return $record->status_id === 5  || $record->status_id === 6 || $record->status_id === 7;
                    }
                ),
            ]);
    }


    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\TextEntry::make('user.lastname')
                    ->size(Infolists\Components\TextEntry\TextEntrySize::Large)
                    ->label("Nom de client"),
                Infolists\Components\TextEntry::make('user.firstname')
                    ->size(Infolists\Components\TextEntry\TextEntrySize::Large)
                    ->label("Prénom de client"),
                Infolists\Components\TextEntry::make('created_at')
                    ->size(Infolists\Components\TextEntry\TextEntrySize::Large)
                    ->label("Date de commande"),
                Infolists\Components\TextEntry::make('user.phoneNumber')
                    ->size(Infolists\Components\TextEntry\TextEntrySize::Large)
                    ->label("Téléphone"),
                Infolists\Components\TextEntry::make('adresse')
                    ->size(Infolists\Components\TextEntry\TextEntrySize::Large)
                    ->label("Adresse")
                    ->weight(FontWeight::Medium)
                    ->columnSpanFull(),
                Infolists\Components\TextEntry::make('coupon.code')
                    ->size(Infolists\Components\TextEntry\TextEntrySize::Large)
                    ->weight(FontWeight::Bold)
                    ->label("Code promo utilisé")
                    ->hidden(function ($record) {
                        return !isset($record->coupon_id);
                    }),
                Infolists\Components\TextEntry::make('coupon.percentage')
                    ->size(Infolists\Components\TextEntry\TextEntrySize::Large)
                    ->weight(FontWeight::Bold)
                    ->label("Pourcentage de réduction")
                    ->formatStateUsing(function ($state) {
                        return $state . " " . "%";
                    })
                    ->hidden(function ($record) {

                        return !isset($record->coupon_id);
                    }),
                Infolists\Components\TextEntry::make('total_price')
                    ->formatStateUsing(function ($state) {
                        return $state . " " . "DA";
                    })
                    ->size(Infolists\Components\TextEntry\TextEntrySize::Large)
                    ->weight(FontWeight::Bold)
                    ->label("Prix Finale")
                    ->columnSpanFull(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            OrderBooksRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'view' => Pages\ViewOrder::route('/{record}'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
