<?php

namespace App\Filament\Resources\CaregiversResource\Pages;

use App\Filament\Resources\CaregiversResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCaregivers extends ViewRecord
{
    protected static string $resource = CaregiversResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
