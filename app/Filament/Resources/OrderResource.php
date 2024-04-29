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
                Tables\Columns\TextColumn::make("status")
                    ->formatStateUsing(function ($state) {
                        $roleNames = [
                            3 => 'Annulée',
                            2 => 'Livrée',
                            1 => 'confirmée',
                            0 => 'Non confirmée'
                        ];

                        return $roleNames[$state] ?? $state;
                    })
                    ->color(function ($record) {
                        if ($record->status === 0) {
                            return "blue";
                        } elseif ($record->status === 1) {
                            return "purple";
                        } elseif ($record->status === 2) {
                            return "green";
                        } elseif ($record->status === 3) {
                            return "danger";
                        }
                    })
                    ->label("État")
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\Action::make("Confirmer")
                        ->action(function (Order $record) {
                            if ($record->status != 2) {
                                $record->status = $record->status + 1;
                                $record->save();
                            }
                        })

                        ->color("primary")
                        ->requiresConfirmation()
                        ->label(function (Order $record) {
                            if ($record->status === 0) {
                                return "Confirmer la commande";
                            } elseif ($record->status === 1) {
                                return "Confirmer la livraison";
                            }
                        }),
                    Tables\Actions\Action::make("Annuler")
                        ->action(function (Order $record) {
                            $record->status = 3;
                            $record->save();
                        })

                        ->color("danger")
                        ->requiresConfirmation(),
                ])->hidden(function (Order $record) {
                    return $record->status === 2 || $record->status === 3;
                })
            ])
            ->bulkActions([]);
    }


    public static function infolist(Infolist $infolist): Infolist
    {
        // this line is for retrieving books and their quantity

        $books_and_quantity = [];
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
