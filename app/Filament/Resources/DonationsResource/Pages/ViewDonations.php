<?php

namespace App\Filament\Resources\DonationsResource\Pages;

use App\Filament\Resources\DonationsResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewDonations extends ViewRecord
{
    protected static string $resource = DonationsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
