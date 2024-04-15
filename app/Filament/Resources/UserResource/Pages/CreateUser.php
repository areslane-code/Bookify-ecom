<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;


    protected static bool $canCreateAnother = false;



    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data["created_at"] = date("Y-m-d H:i:s");
        return $data;
    }
}
