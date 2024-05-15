<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Illuminate\Support\Carbon;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use PDO;

class Chart extends ChartWidget
{

    use InteractsWithPageFilters;

    protected static ?string $heading = 'Commandes';

    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 2;







    protected function getData(): array
    {

        $filter = $this->filters["time"];
        $firstRecordDateString = Order::min('created_at');
        $firstRecordDate = Carbon::parse(strtotime($firstRecordDateString));



        if ($filter === "last_week") {
            $data = Trend::model(Order::class)
                ->between(
                    start: now()->subWeek(),
                    end: now(),
                )
                ->perDay()
                ->count();
        } else if ($filter === "last_month") {
            $data = Trend::model(Order::class)
                ->between(
                    start: now()->subMonth(),
                    end: now(),
                )
                ->perDay()
                ->count();
        } else if ($filter === "last_year") {
            $data = Trend::model(Order::class)
                ->between(
                    start: now()->subYear(),
                    end: now(),
                )
                ->perMonth()
                ->count();
        } else {
            $data = Trend::model(Order::class)
                ->between(
                    $firstRecordDate,
                    now(),
                )
                ->perMonth()
                ->count();
        }


        return [
            'datasets' => [
                [
                    'label' => 'Commandes',
                    'data' =>
                    $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
