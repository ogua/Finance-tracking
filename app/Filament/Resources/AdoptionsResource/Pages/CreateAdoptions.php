<?php

namespace App\Filament\Resources\AdoptionsResource\Pages;

use App\Filament\Resources\AdoptionsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAdoptions extends CreateRecord
{
    protected static string $resource = AdoptionsResource::class;
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
