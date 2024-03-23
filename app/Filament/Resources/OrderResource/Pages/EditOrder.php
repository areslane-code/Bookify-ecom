<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditOrder extends EditRecord
{
    protected static string $resource = OrderResource::class;

    protected function getSaveFormAction(): Action
    {
        return
            Action::make('save')
            ->label("Sauvgarder")
            ->submit('save')
            ->keyBindings(['mod+s']);
    }

    protected function getCancelFormAction(): Action
    {
        return Action::make('cancel')
            ->label("Annuler")
            ->url($this->previousUrl ?? static::getResource()::getUrl())
            ->color('gray');
    }


    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->label("supprimer"),
        ];
    }
}
