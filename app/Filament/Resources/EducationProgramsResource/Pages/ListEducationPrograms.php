<?php

namespace App\Filament\Resources\EducationProgramsResource\Pages;

use App\Filament\Resources\EducationProgramsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEducationPrograms extends ListRecords
{
    protected static string $resource = EducationProgramsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
