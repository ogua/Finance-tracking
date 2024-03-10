<?php

namespace App\Filament\Resources\CaregiversResource\Pages;

use App\Filament\Resources\CaregiversResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCaregivers extends EditRecord
{
    protected static string $resource = CaregiversResource::class;
    
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
