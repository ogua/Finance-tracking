<?php

namespace App\Filament\Resources\OrphansResource\Pages;

use App\Filament\Resources\OrphansResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrphans extends EditRecord
{
    protected static string $resource = OrphansResource::class;
    
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
