<?php

namespace App\Filament\Resources\OrphansResource\Pages;

use App\Filament\Resources\OrphansResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOrphans extends CreateRecord
{
    protected static string $resource = OrphansResource::class;
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
