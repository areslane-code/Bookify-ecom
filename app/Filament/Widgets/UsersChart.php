<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Carbon;

class UsersChart extends ChartWidget
{
    use InteractsWithPageFilters;


    protected static ?string $heading = 'Utilisateurs';
    protected static ?int $sort = 3;
    protected int | string | array $columnSpan = 2;




    protected function getData(): array
    {
        $filter = $this->filters["time"];
        $firstRecordDateString = User::min('created_at');

        $firstRecordDate = Carbon::parse(strtotime($firstRecordDateString));





        if ($filter === "last_week") {
            $data = Trend::model(User::class)
                ->between(
                    start: now()->subWeek(),
                    end: now(),
                )
                ->perDay()
                ->count();
        } else if ($filter === "last_month") {
            $data = Trend::model(User::class)
                ->between(
                    start: now()->subMonth(),
                    end: now(),
                )
                ->perDay()
                ->count();
        } else if ($filter === "last_year") {
            $data = Trend::model(User::class)
                ->between(
                    start: now()->subYear(),
                    end: now(),
                )
                ->perMonth()
                ->count();
        } else {
            $data = Trend::model(User::class)
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
                    'label' => 'utilisateur',
                    "data" =>
                    $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' =>
            $data->map(fn (TrendValue $value) => $value->date),
        ];
    }


    protected function getType(): string
    {
        return 'line';
    }
}
