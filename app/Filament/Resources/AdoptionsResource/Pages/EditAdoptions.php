<?php

namespace App\Filament\Resources\AdoptionsResource\Pages;

use App\Filament\Resources\AdoptionsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAdoptions extends EditRecord
{
    protected static string $resource = AdoptionsResource::class;
    
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
