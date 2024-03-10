<?php

namespace App\Filament\Resources\OrphansResource\Widgets;

use App\Models\Orphans;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class Orphanoverview extends BaseWidget
{
    protected function getStats(): array
    {
        $orphan = Orphans::query();
        $total = $orphan->count();
        $male = $orphan->where('gender','Male')->count();
        $female = $orphan->where('gender','Female')->count();
        
        return [
            Stat::make('Total Orphans',$total),
            Stat::make('Total Male', $male),
            Stat::make('Total Female', $female),
        ];
    }
}
