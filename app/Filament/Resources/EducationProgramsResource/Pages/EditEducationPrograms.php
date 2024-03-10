<?php

namespace App\Filament\Resources\EducationProgramsResource\Pages;

use App\Filament\Resources\EducationProgramsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEducationPrograms extends EditRecord
{
    protected static string $resource = EducationProgramsResource::class;
    
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
