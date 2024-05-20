<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;


    protected static bool $canCreateAnother = false;

    protected ?string $heading = "Créer un compte libraire";


    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data["role"] = 1;
        $data["created_at"] = date("Y-m-d H:i:s");
        return $data;
    }

    protected function afterValidate(): void
    {
        $record_email = $this->data['email'];
        // Check if the email field contains a specific value
        if (User::where("email", $record_email)->get()) {
            $this->addError('email', 'Vous devez entrer une adresse qui n\'exist pas déja');
        }
    }
}
