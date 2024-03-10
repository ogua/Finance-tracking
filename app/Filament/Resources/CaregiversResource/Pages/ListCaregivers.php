<?php

namespace App\Filament\Resources\CaregiversResource\Pages;

use App\Filament\Resources\CaregiversResource;
use App\Filament\Resources\CaregiversResource\Widgets\CaregiversOverview;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCaregivers extends ListRecords
{
    protected static string $resource = CaregiversResource::class;
    
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    
    protected function getHeaderWidgets(): array
    {
        return [
            CaregiversOverview::class,
        ];
    }
}
