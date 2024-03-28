<?php

namespace App\Filament\Resources\ReviewResource\Pages;

use App\Filament\Resources\ReviewResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewReview extends ViewRecord
{
    protected static string $resource = ReviewResource::class;

    protected static ?string  $breadcrumb = "";
    protected static ?string  $title = "Détail d'avis";




    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label("supprimer")
                ->modalHeading('Supprimer Avis')
                ->modalDescription('')
                ->modalSubmitActionLabel('Supprimer')
                ->modalCancelActionLabel("Annuler")
                ->successNotificationTitle('Avis supprimé')
        ];
    }
}
