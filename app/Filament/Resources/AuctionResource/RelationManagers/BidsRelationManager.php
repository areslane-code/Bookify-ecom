<?php

namespace App\Filament\Resources\AuctionResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BidsRelationManager extends RelationManager
{
    protected static string $relationship = 'bids';

    public function isReadOnly(): bool
    {
        return true;
    }


    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user')
                    ->getOptionLabelFromRecordUsing(fn($record) => "{$record->firstname} {$record->lastname}")
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('amount')
                    ->required()
                    ->maxLength(255),

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.firstname'),
                Tables\Columns\TextColumn::make('user.lastname'),
                Tables\Columns\TextColumn::make('amount'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),

            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
