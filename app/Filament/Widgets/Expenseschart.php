<?php

namespace App\Filament\Widgets;

use App\Models\Expenses;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class Expenseschart extends ChartWidget
{
    protected static ?string $heading = 'Expenses';
    
    protected static string $color = 'info';
    
    protected int | string | array $columnSpan = 'full';
    
    protected static ?int $sort = 4;
    
    protected function getData(): array
    {
        $data = Trend::model(Expenses::class)
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();
            
            return [
                'datasets' => [
                    [
                        'label' => 'Orphans Trends',
                        'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                    ],
                ],
                'labels' => $data->map(fn (TrendValue $value) => $value->date),
            ];
        }
        
        protected function getType(): string
        {
            return 'doughnut';
        }
    }
    