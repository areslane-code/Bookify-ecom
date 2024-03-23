<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\ChartWidget;

class Chart extends ChartWidget
{
    protected static ?string $heading = 'Commandes';

    protected static ?int $sort = 2;




    protected function getData(): array
    {
        $data = Order::countOrders();

        return [
            'datasets' => [
                [
                    'label' => 'Commandes par mois',
                    'data' => $data,
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
