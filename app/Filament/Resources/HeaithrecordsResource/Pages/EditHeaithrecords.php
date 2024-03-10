<?php

namespace App\Filament\Resources\HeaithrecordsResource\Pages;

use App\Filament\Resources\HeaithrecordsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHeaithrecords extends EditRecord
{
    protected static string $resource = HeaithrecordsResource::class;
    
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
