<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AuctionResource\Pages;
use App\Filament\Resources\AuctionResource\RelationManagers;
use App\Models\Auction;
use App\Models\Bid;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AuctionResource extends Resource
{
    protected static ?string $model = Auction::class;

    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-line';

    protected static ?string $navigationLabel = "Enchères";

    protected static ?string $modelLabel = "Enchères";

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('book_id')
                    ->required()
                    ->relationship(
                        'book',
                        'title',
                        fn($query) => $query->where('type', 'auction')
                    )
                    ->columnSpanFull()
                    ->label("Selectionner le Livre"),

                Forms\Components\TextInput::make('min_bid_amount')
                    ->required()
                    ->minValue(0)
                    ->numeric()
                    ->label("Minimum Prix d'enchèrissement"),
                Forms\Components\DateTimePicker::make('auction_final_date')
                    ->required()
                    ->minDate(now())
                    ->label("Date de fin d'enchère"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('book.title')
                    ->label('Titre du livre'),
                Tables\Columns\TextColumn::make('book.description')
                    ->label('Description du livre'),
                Tables\Columns\TextColumn::make('min_bid_amount')
                    ->label('prix minimun'),
                Tables\Columns\TextColumn::make('auction_final_date')
                    ->label('Date de fin d\'enchère'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
            AuctionResource\RelationManagers\BidsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAuctions::route('/'),
            'create' => Pages\CreateAuction::route('/create'),
            'edit' => Pages\EditAuction::route('/{record}/edit'),

        ];
    }
}
