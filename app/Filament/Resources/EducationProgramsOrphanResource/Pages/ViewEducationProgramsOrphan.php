<?php

namespace App\Filament\Resources\EducationProgramsOrphanResource\Pages;

use App\Filament\Resources\EducationProgramsOrphanResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEducationProgramsOrphan extends ViewRecord
{
    protected static string $resource = EducationProgramsOrphanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
