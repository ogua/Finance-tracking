<?php

namespace App\Filament\Resources\EducationProgramsOrphanResource\Pages;

use App\Filament\Resources\EducationProgramsOrphanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEducationProgramsOrphan extends CreateRecord
{
    protected static string $resource = EducationProgramsOrphanResource::class;
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
