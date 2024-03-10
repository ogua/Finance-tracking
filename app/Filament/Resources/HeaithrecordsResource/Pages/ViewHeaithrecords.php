<?php

namespace App\Filament\Resources\HeaithrecordsResource\Pages;

use App\Filament\Resources\HeaithrecordsResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewHeaithrecords extends ViewRecord
{
    protected static string $resource = HeaithrecordsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
