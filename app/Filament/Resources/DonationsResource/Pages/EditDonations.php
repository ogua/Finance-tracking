<?php

namespace App\Filament\Resources\DonationsResource\Pages;

use App\Filament\Resources\DonationsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDonations extends EditRecord
{
    protected static string $resource = DonationsResource::class;
    
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
