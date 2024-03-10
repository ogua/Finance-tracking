<?php

namespace App\Filament\Resources\EducationProgramsResource\Pages;

use App\Filament\Resources\EducationProgramsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEducationPrograms extends CreateRecord
{
    protected static string $resource = EducationProgramsResource::class;
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
