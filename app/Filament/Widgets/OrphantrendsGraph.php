<?php

namespace App\Filament\Widgets;

use App\Models\Orphans;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class OrphantrendsGraph extends ChartWidget
{
    
    protected static ?string $heading = 'Orphans Trends';
    
    protected static string $color = 'info';
    
    protected int | string | array $columnSpan = 'full';
    
    protected static ?int $sort = 3;
    
    protected function getData(): array
    {
        $data = Trend::model(Orphans::class)
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
            return 'line';
        }
    }
    