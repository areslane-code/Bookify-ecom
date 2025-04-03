<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReviewResource\Pages;
use App\Filament\Resources\ReviewResource\RelationManagers;
use App\Models\Review;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static ?string $navigationLabel = "Avis";

    protected static ?string $modelLabel = "Avis";

    protected static ?int $navigationSort = 7;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-oval-left-ellipsis';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('lastname')
                    ->relationship("user", "lastname")
                    ->required()
                    ->label("Nom")
                    ->disabled(),
                Forms\Components\Select::make('firstname')
                    ->relationship("user", "firstname")
                    ->required()
                    ->label("Prénom")
                    ->disabled(),
                Forms\Components\Select::make('Livre')
                    ->relationship("book", "title")
                    ->label("Titre")
                    ->required()
                    ->disabled(),
                Forms\Components\TextInput::make('rating')
                    ->label("Notation")
                    ->required()
                    ->disabled(),
                Forms\Components\Textarea::make('content')
                    ->label("Contenu")
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.lastname')
                    ->searchable()
                    ->label("Utilisateur"),
                Tables\Columns\TextColumn::make('user.firstname')
                    ->searchable()
                    ->label(""),
                Tables\Columns\TextColumn::make('book.title')
                    ->searchable()
                    ->label("Titre")
                    ->searchable(),
                Tables\Columns\TextColumn::make('rating')
                    ->searchable()
                    ->label("Notation")
                    ->limit(30),
                Tables\Columns\TextColumn::make('content')
                    ->searchable()
                    ->label("Contenu")
                    ->limit(30),
            ])
            ->filters([
                //
            ])
            ->searchPlaceholder("Rechercher")

            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label("")
                    ->color("primary"),
                Tables\Actions\DeleteAction::make()
                    ->label("")
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([]),
            ]);
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
            'index' => Pages\ListReviews::route('/'),
            'view' => Pages\ViewReview::route('/{record}'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
