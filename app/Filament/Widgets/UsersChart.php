<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\ChartWidget;

class UsersChart extends ChartWidget
{
    protected static ?string $heading = 'Utilisateurs';
    protected static ?int $sort = 3;




    protected function getData(): array
    {
        $data = User::countUsers();

        return [
            'datasets' => [
                [
                    'label' => 'utilisateur par mois',
                    "data" => $data
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }


    protected function getType(): string
    {
        return 'line';
    }
}
