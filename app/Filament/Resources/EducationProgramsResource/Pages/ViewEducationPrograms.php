<?php

namespace App\Filament\Resources\EducationProgramsResource\Pages;

use App\Filament\Resources\EducationProgramsResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEducationPrograms extends ViewRecord
{
    protected static string $resource = EducationProgramsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
