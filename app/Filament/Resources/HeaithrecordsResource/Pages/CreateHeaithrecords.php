<?php

namespace App\Filament\Resources\HeaithrecordsResource\Pages;

use App\Filament\Resources\HeaithrecordsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHeaithrecords extends CreateRecord
{
    protected static string $resource = HeaithrecordsResource::class;
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
