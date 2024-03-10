<?php

namespace App\Filament\Resources\CaregiversResource\Widgets;

use App\Models\Caregivers;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CaregiversOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $orphan = Caregivers::query();
        $total = $orphan->count();
        $male = $orphan->where('gender','Male')->count();
        $female = $orphan->where('gender','Female')->count();
        
        return [
            Stat::make('Total Caregivers',$total),
            Stat::make('Total Male', $male),
            Stat::make('Total Female', $female),
        ];
    }
}
