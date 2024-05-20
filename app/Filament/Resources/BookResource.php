<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Book;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BookResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\Filament\Resources\BookResource\RelationManagers;
use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationLabel = "Livres";

    protected static ?string $modelLabel = "Livres";

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->disk('local')
                    ->visibility('public')
                    ->directory("public")
                    ->preserveFilenames()
                    ->required()
                    ->previewable(true)

                    ->label("Image")
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        null,
                        '4:3',
                        '1:1',
                    ]),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->minLength(0)
                    ->maxLength(255)
                    ->label("Titre"),
                Forms\Components\TextInput::make('author')
                    ->required()
                    ->regex('/^[a-zA-Zé ]+$/')
                    ->minLength(0)
                    ->maxLength(255)
                    ->label("Auteur"),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->suffix('DA')
                    ->label("Prix"),
                Forms\Components\TextInput::make('quantity')
                    ->required()
                    ->minValue(0)
                    ->numeric()
                    ->label("Quantité"),
                Forms\Components\Select::make('categories')
                    ->relationship('categories', "name")
                    ->searchable($condition = false)
                    ->preload()
                    ->multiple()
                    ->required()
                    ->label("categories"),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull()
                    ->label("Description"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->label("Titre"),
                Tables\Columns\TextColumn::make('author')
                    ->searchable()
                    ->label("Auteur"),
                Tables\Columns\TextColumn::make('price')
                    ->formatStateUsing(function ($state) {
                        return $state . " " . "Da";
                    })
                    ->searchable()
                    ->sortable()
                    ->label("Prix"),
                Tables\Columns\TextColumn::make('quantity')
                    ->searchable()
                    ->numeric()
                    ->sortable()
                    ->badge()
                    ->label("Quantité")
                    ->color(function ($state, $record): string {
                        return $record->quantity > 0 ? "green" : "danger";
                    }),

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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'view' => Pages\ViewBook::route('/{record}'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }
}
