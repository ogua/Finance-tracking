<?php

namespace App\Filament\Resources\SponsorsResource\Pages;

use App\Filament\Resources\SponsorsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSponsors extends EditRecord
{
    protected static string $resource = SponsorsResource::class;
    
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
