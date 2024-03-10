<?php

namespace App\Filament\Resources\EducationProgramsOrphanResource\Pages;

use App\Filament\Resources\EducationProgramsOrphanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEducationProgramsOrphan extends EditRecord
{
    protected static string $resource = EducationProgramsOrphanResource::class;
    
    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
