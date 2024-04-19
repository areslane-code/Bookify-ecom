<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CouponResource\Pages;
use App\Filament\Resources\CouponResource\RelationManagers;
use App\Models\Coupon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CouponResource extends Resource
{
    protected static ?string $model = Coupon::class;

    protected static ?string $navigationLabel = "Codes promos";

    protected static ?string $modelLabel = "Codes de promotions";

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?int $navigationSort = 5;

    public static function canAccess(): bool
    {
        // authorize only admin
        return auth()->user()->role === 2;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('code')
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('percentage')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100)
                    ->required()
                    ->label("Pourcentage"),
                Forms\Components\DatePicker::make('expires_at')
                    ->closeOnDateSelection()
                    ->displayFormat('d/m/Y')
                    ->required()
                    ->label("Date d'expiration"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('percentage')
                    ->numeric()
                    ->sortable()
                    ->label("Pourcentage"),
                Tables\Columns\TextColumn::make('expires_at')
                    ->date("d/m/Y")
                    ->sortable()
                    ->label("Date d'expiration"),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label("modifier"),
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
            'index' => Pages\ListCoupons::route('/'),
            'create' => Pages\CreateCoupon::route('/create'),
            'view' => Pages\ViewCoupon::route('/{record}'),
            'edit' => Pages\EditCoupon::route('/{record}/edit'),
        ];
    }
}
