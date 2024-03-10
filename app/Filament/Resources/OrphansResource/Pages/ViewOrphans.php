<?php

namespace App\Filament\Resources\OrphansResource\Pages;

use App\Filament\Resources\OrphansResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewOrphans extends ViewRecord
{
    protected static string $resource = OrphansResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
