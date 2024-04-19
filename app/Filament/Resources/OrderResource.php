<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
                        } else {
                            return "green";
                        }
                    })
                    ->label("État")
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make()->label(""),
            ])
            ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [
            //
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
