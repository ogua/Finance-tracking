<?php

namespace App\Filament\Resources\AdoptionsResource\Pages;

use App\Filament\Resources\AdoptionsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListAdoptions extends ListRecords
{
    protected static string $resource = AdoptionsResource::class;
    
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    
    public function getTabs(): array
    {
        return [
            'all' => Tab::make('All'),
            'Taken' => Tab::make('Taken orphans')
            ->modifyQueryUsing(fn (Builder $query) => $query->where('status', "Taken")),
            'Returned' => Tab::make('Returned orphans')
            ->modifyQueryUsing(fn (Builder $query) => $query->where('status', "Returned")),
            'Processing' => Tab::make('Processing')
            ->modifyQueryUsing(fn (Builder $query) => $query->where('status', "Processing")),
        ];
    }
}
