<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Models\Order;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Tables;
use Filament\Tables\Table;
use Barryvdh\DomPDF\Facade\Pdf;

class ViewOrder extends ViewRecord
{
    protected static string $resource = OrderResource::class;

    protected ?string $heading = "Détails de la commande";

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make("imprimer la facture")
                ->action(fn(Order $record) => ViewOrder::printrecord($record))
            // ->visible(function ($record) {
            //      visible only when the order is confirmed.
            //     return $record->status_id === 2 || $record->status_id === 3 || $record->status_id === 4 || $record->status_id === 5;
            // })
        ];
    }

    public static function printrecord(Order $record)
    {
        $recordDate    = $record->created_at;
        $client     = $record->user->lastname . " " .  $record->user->firstname;
        $fileName       = "facture{$recordDate}_{$client}.pdf";
        $initialprice = 0;
        foreach ($record->books as $book) {
            $initialprice = $initialprice + $book->price * $book->pivot->quantity;
        }
        $pdf            = Pdf::loadView('print', compact('record', 'fileName', "client", "initialprice"));

        return response()->streamDownload(fn() => print($pdf->output()), $fileName);
    }
}
