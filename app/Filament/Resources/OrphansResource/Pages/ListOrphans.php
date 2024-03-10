<?php

namespace App\Filament\Resources\OrphansResource\Pages;

use App\Filament\Resources\OrphansResource;
use App\Filament\Resources\OrphansResource\Widgets\Orphanoverview;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListOrphans extends ListRecords
{
    protected static string $resource = OrphansResource::class;
    
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    
    protected function getHeaderWidgets(): array
    {
        return [
            Orphanoverview::class,
        ];
    }
    
    public function getTabs(): array
    {
        return [
            'all' => Tab::make('All'),
            'Male' => Tab::make('Male')
            ->modifyQueryUsing(fn (Builder $query) => $query->where('gender', "Male")),
            'Female' => Tab::make('Female')
        ];
    }
}
