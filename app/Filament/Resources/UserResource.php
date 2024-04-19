<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Forms\Components\Actions;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;



    protected static ?string $navigationLabel = "Utilisateurs";

    protected static ?string $modelLabel = "Utilisateurs";

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?int $navigationSort = 1;



    public static function canAccess(): bool
    {
        // authorize only admin
        return auth()->user()->role === 2;
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('lastname')
                    ->required()
                    ->maxLength(255)
                    ->label("Nom"),
                Forms\Components\TextInput::make('firstname')
                    ->required()
                    ->maxLength(255)
                    ->label("Prénom"),
                Forms\Components\TextInput::make('phoneNumber')
                    ->tel()
                    ->telRegex('/0[0-9]{9}/')
                    ->required()
                    ->label("Téléphone"),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required()
                    ->visibleOn("create")
                    ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
                    ->maxLength(255),
            ]);
    }



    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('lastname')
                    ->label("Nom")
                    ->searchable(),
                Tables\Columns\TextColumn::make('firstname')
                    ->searchable()
                    ->label("Prénom"),
                Tables\Columns\TextColumn::make('role')
                    ->label("Role")
                    ->formatStateUsing(function ($state) {
                        $roleNames = [
                            2 => 'Admin',
                            1 => 'libraire',
                            0 => 'client'
                        ];

                        return $roleNames[$state] ?? $state;
                    }),
                Tables\Columns\TextColumn::make('phoneNumber')
                    ->label("Téléphone"),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->label("Email"),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label("modifier"),
                Tables\Actions\DeleteAction::make()->label(""),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([]),
            ])
            ->defaultSort("role", "desc");
    }

    public static function getTableActions(): array
    {
        return [
            EditAction::make()
                ->label('Modifier'), // Change the text here
        ];
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getActions(): array
    {
        return [
            CreateAction::make()
                ->getLabel('Créer utilisateur'),
        ];
    }
}
