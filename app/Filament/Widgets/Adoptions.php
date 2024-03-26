<?php

namespace App\Filament\Widgets;

use App\Models\Adoptions as ModelsAdoptions;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class Adoptions extends BaseWidget
{
    protected static ?int $sort = 2;
    
    protected function getStats(): array
    {
        $orphan = ModelsAdoptions::query();
        $total = $orphan->count();
        $process = $orphan->where('status','Processing')->count();
        $Returned = $orphan->where('status','Returned')->count();
        $Completed = $orphan->where('status','Taken')->count();
        
        return [
            Stat::make('Total Adoptions',$total),
            Stat::make('Total Processing', $process),
            Stat::make('Total Returned', $Returned),
            Stat::make('Total Completed', $Completed),
        ];
    }
}
