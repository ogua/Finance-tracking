<?php

namespace App\Filament\Resources\AdoptionsResource\Pages;

use App\Filament\Resources\AdoptionsResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAdoptions extends ViewRecord
{
    protected static string $resource = AdoptionsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
