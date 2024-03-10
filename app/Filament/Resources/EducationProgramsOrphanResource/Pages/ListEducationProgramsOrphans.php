<?php

namespace App\Filament\Resources\EducationProgramsOrphanResource\Pages;

use App\Filament\Resources\EducationProgramsOrphanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEducationProgramsOrphans extends ListRecords
{
    protected static string $resource = EducationProgramsOrphanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
