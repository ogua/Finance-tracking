<?php

namespace App\Filament\Resources\CaregiversResource\Pages;

use App\Filament\Resources\CaregiversResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCaregivers extends CreateRecord
{
    protected static string $resource = CaregiversResource::class;
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
